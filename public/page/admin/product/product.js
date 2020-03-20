var url_product = base_ajax + '/admin/product/datatables';

$(document).ready(function() {
    // load table product
    renderTableProduct();

    // filter product
    renderFilterProduct();

    // event create product
    $("#btn_create_product").on('click', function() {
        freshModalProduct('create');
        $("#modal_product").modal('show');
    });

    // load amount input
    $($('#product_amount')).autoNumeric('init', { vMin: 0, mDec: '0' });

    // load js image
    renderUploadImage();

    // ckeditor
    loadCkeditor('product_description');

    // event detail product
    $("#table_product").on('click', '.btn-edit-product', function() {
        var product_id = $(this).data('id');
        $("#frm_product").data('type', 'update');
        $("#frm_product").data('id', product_id);

        freshModalProduct();
        $("#modal_product").modal('show');
        run_waitMe('#modal_product .modal-content');

        getAPI(base_ajax + '/admin/product/detail?id=' + product_id, function(data) {
            if (data) {
                renderProductUpload(data);
            } else {
                run_waitMe('#modal_product .modal-content', true);
            }
        });
    });

    // event save update product
    $("#btn_update_product").on('click', function() {
        var el_frm = $("#frm_product");
        var isCheck = true;
        el_frm.parsley().validate();

        if (!el_frm.parsley().isValid()) {
            isCheck = false;
        }

        if (!checkImage()) {
            isCheck = false;
        }

        if (!checkDescription()) {
            isCheck = false;
        }

        if (isCheck) {
            formSubmit();
        }
    });

    // event trash product
    $("#table_product").on('click', '.btn-trash-product', function() {
        var _this = $(this);

        Swal.fire({
            title: '',
            text: "Are you sure you want to delete ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function(result) {
            if (result.value) {
                var _el_table = $("#table_product").DataTable();
                var _id = _this.data('id');

                deleteAPI(base_ajax + '/admin/product/delete?id=' + _id, function() {
                    renderTableProduct();
                });
            }
        });
    });
});

var renderProductUpload = function(data) {
    $("#product_name").val(data.name);
    $("#product_title").val(data.title);
    $("#product_amount").val(formatNumber(data.amount));

    // image
    var api_file_upload = $.fileuploader.getInstance('input[name="image"]');
    var path_img = data.image;

    if (path_img && path_img.length > 0) {
        var paths = path_img.split('/');
        var name_img = 'notfound.jpg';
        var type_img = 'png';
        var types = path_img.split('.');

        if (paths.length > 0) {
            name_img = paths[paths.length - 1];
        }

        if (types.length > 0) {
            type_img = types[types.length - 1];
        }

        api_file_upload.append([{
            name: name_img,
            type: 'image/' + type_img,
            file: location.origin + path_img,
            data: {
                thumbnail: location.origin + path_img,
            }
        }]);
        api_file_upload.updateFileList();
    }

    // description
    setValueCKEditor('product_description', data.description);

    run_waitMe('#modal_product .modal-content', true);
}

var checkImage = function() {
    var result = true;
    var val = $("#image").val();
    var type = $("#frm_product").data('type');

    if (type == 'create') {
        if (!val || val == "") {
            result = false;
            $("#error_image").removeClass('d-none');
        } else {
            $("#error_image").addClass('d-none');
        }
    }

    return result;
}

var checkDescription = function() {
    var val = getValueCKEditor('product_description');
    var result = true;

    if (!val || val == "") {
        result = false;
        $("#error_description").removeClass('d-none');
    } else {
        $("#error_description").addClass('d-none');
    }

    return result;
}

var formSubmit = function() {
    run_waitMe('#modal_product .modal-content');
    var post_form = new FormData($('#frm_product')[0]);
    var url = base_ajax + '/admin/product/update';
    var type = $("#frm_product").data('type');
    var product_id = $("#frm_product").data('id');

    if (!type) {
        type = 'create';
    }

    post_form.append('type', type);
    post_form.set('amount', $("#product_amount").val().replace(/\,/g, ''));
    post_form.set('description', getValueCKEditor('product_description'));

    if (type == 'update') {
        post_form.append('id', product_id);
    }

    $.ajax({
        url: url,
        type: "POST",
        data: post_form,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response.code === 201) {
                Swal.fire({
                    type: 'success',
                    title: response.msg,
                    confirmButtonText: "OK"
                });
                $("#modal_product").modal('hide');
                renderTableProduct();
            } else {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops',
                    text: response.msg
                });
            }
            run_waitMe('#modal_product .modal-content', true);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Swal.fire({
                type: 'warning',
                title: 'Oops',
                text: 'There was an error during processing'
            });
            run_waitMe('#modal_product .modal-content', true);
            checkErrorResponse(jqXHR);
        }
    });
}

var freshModalProduct = function(_type) {
    $("#product_name").val('');
    $("#product_title").val('');
    $("#product_name").val('');

    $("#frm_product").data('type', _type);

    $("#frm_product").data('isSubmit', false);

    var api_file_upload = $.fileuploader.getInstance('input[name="image"]');

    if (!api_file_upload.isEmpty()) {
        api_file_upload.reset();
    }

    $('#product_amount').val('');

    setValueCKEditor('product_description');

    $("#error_image").addClass('d-none');

    $("#frm_product").parsley().reset();
}

var getValueCKEditor = function(_id) {
    var result = '';
    var ck_el = CKEDITOR.instances[_id];

    if (ck_el) {
        result = ck_el.getData();
    }

    return result;
}

var setValueCKEditor = function(_id, val) {
    var result = '';
    var ck_el = CKEDITOR.instances[_id];

    if (ck_el) {
        result = ck_el.setData(val);
    } else {
        result = ck_el.setData('');
    }
}

var loadCkeditor = function(_id) {
    CKEDITOR.replace(_id, {
        toolbar: [
            { name: 'document', groups: ['mode', 'document', 'doctools'], items: ['Source'] },
            { name: 'clipboard', groups: ['clipboard', 'undo'], items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'] },
            { name: 'editing', items: ['Scayt'] },
            { name: 'basicstyles', groups: ['basicstyles', 'cleanup'], items: ['Bold', 'Italic', 'Strike', '-', 'RemoveFormat'] },
            { name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi'], items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote'] },
            { name: 'insert', items: ['HorizontalRule', 'SpecialChar'] },
            '/',
            { name: 'styles', items: ['Styles', 'Format'] },
            { name: 'tools', items: ['Maximize'] },
        ],
        language: 'en',
    });
}

var renderUploadImage = function() {
    // enable fileuploader plugin
    $('input[name="image"]').fileuploader({
        limit: 1,
        maxSize: 5,
        extensions: ['jpg', 'jpeg', 'png'],
        changeInput: ' ',
        theme: 'thumbnails',
        enableApi: true,
        addMore: false,
        thumbnails: {
            box: '<div class="fileuploader-items">' +
                '<ul class="fileuploader-items-list">' +
                '<li class="fileuploader-thumbnails-input"><div class="fileuploader-thumbnails-input-inner"><i>+</i></div></li>' +
                '</ul>' +
                '</div>',
            item: '<li class="fileuploader-item">' +
                '<div class="fileuploader-item-inner">' +
                '<div class="type-holder">${extension}</div>' +
                '<div class="actions-holder">' +
                '<button type="button" class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="fileuploader-icon-remove"></i></button>' +
                '</div>' +
                '<div class="thumbnail-holder">' +
                '${image}' +
                '<span class="fileuploader-action-popup"></span>' +
                '</div>' +
                '<div class="content-holder"><h5>${name}</h5><span>${size2}</span></div>' +
                '<div class="progress-holder">${progressBar}</div>' +
                '</div>' +
                '</li>',
            item2: '<li class="fileuploader-item">' +
                '<div class="fileuploader-item-inner">' +
                '<div class="type-holder">${extension}</div>' +
                '<div class="actions-holder">' +
                '<a href="${file}" class="fileuploader-action fileuploader-action-download" title="${captions.download}" download><i class="fileuploader-icon-download"></i></a>' +
                '<button type="button" class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="fileuploader-icon-remove"></i></button>' +
                '</div>' +
                '<div class="thumbnail-holder">' +
                '${image}' +
                '<span class="fileuploader-action-popup"></span>' +
                '</div>' +
                '<div class="content-holder"><h5 title="${name}">${name}</h5><span>${size2}</span></div>' +
                '<div class="progress-holder">${progressBar}</div>' +
                '</div>' +
                '</li>',
            startImageRenderer: true,
            canvasImage: false,
            _selectors: {
                list: '.fileuploader-items-list',
                item: '.fileuploader-item',
                start: '.fileuploader-action-start',
                retry: '.fileuploader-action-retry',
                remove: '.fileuploader-action-remove'
            },
            onItemShow: function(item, listEl, parentEl, newInputEl, inputEl) {
                var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                    api = $.fileuploader.getInstance(inputEl.get(0));

                plusInput.insertAfter(item.html)[api.getOptions().limit && api.getChoosedFiles().length >= api.getOptions().limit ? 'hide' : 'show']();

                if (item.format == 'image') {
                    item.html.find('.fileuploader-item-icon').hide();
                }
            },
            onItemRemove: function(html, listEl, parentEl, newInputEl, inputEl) {
                var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                    api = $.fileuploader.getInstance(inputEl.get(0));

                html.children().animate({ 'opacity': 0 }, 200, function() {
                    html.remove();

                    if (api.getOptions().limit && api.getChoosedFiles().length - 1 < api.getOptions().limit)
                        plusInput.show();
                });
            }
        },
        dragDrop: {
            container: '.fileuploader-thumbnails-input'
        },
        afterRender: function(listEl, parentEl, newInputEl, inputEl) {
            var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                api = $.fileuploader.getInstance(inputEl.get(0));

            plusInput.on('click', function() {
                api.open();
            });

            api.getOptions().dragDrop.container = plusInput;
        },
    });
}

var renderFilterProduct = function() {
    $("#filter_paging").select2({
        minimumResultsForSearch: ''
    });

    $('#filter_paging').on('change', function() {
        $("#table_product").DataTable().page.len($(this).val()).draw();
    });

    $("#filter_search").on('keypress', function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);

        if (code == 13) {
            $("#table_product").DataTable().search($("#filter_search").val()).draw();
        }
    });

    $('#filter_search_btn').on('click', function() {
        $("#table_product").DataTable().search($("#filter_search").val()).draw();
    });
}

var renderTableProduct = function() {
    var el_waiting = '.page-wrapper';
    var product_table = '#table_product';
    run_waitMe(el_waiting);

    if ($.fn.DataTable.isDataTable(product_table)) {
        $(product_table).DataTable().destroy();
        $('.table-unit tbody').empty();
    }

    return $(product_table).DataTable({
        autoWidth: false,
        "processing": true,
        "serverSide": true,
        "ajax": url_product,
        "bInfo": false,
        "pagingType": "full_numbers",
        "language": {
            searchPlaceholder: 'Search...',
            sSearch: ''
        },
        "sLengthSelect": "select2",
        "responsive": true,
        "order": [
            [0, 'desc']
        ],
        "columns": [{
                data: 'id',
                name: 'id',
            },
            {
                data: 'name',
                name: 'name',
            },
            {
                data: 'title',
                name: 'title',
            },
            {
                data: 'amount',
                name: 'amount',
            },
            {
                data: 'description',
                name: 'description',
            },
            {
                data: 'image',
                name: 'image',
            },
            {
                data: 'action',
                name: 'action',
                className: 'text-center',
                orderable: false,
                searchable: false,
            },
        ],
        columnDefs: [],
        "initComplete": function(settings, json) {
            $('[data-toggle="tooltip"]').tooltip();
            run_waitMe(el_waiting, true);
        },
    }).on('processing.dt', function(e, settings, processing) {
        if (processing) {
            run_waitMe(el_waiting);
        } else {
            run_waitMe(el_waiting, true);
        }
    });
}
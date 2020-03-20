var url_product = base_ajax + '/user/get-products?group=';

$(document).ready(function() {
    get_product(0);
});

var get_product = function(group) {
    getAPI(url_product + group, function(data) {
        if (data) {
            renderProducts(data);
            if (group < 3) {
                get_product(group + 1);
            }
        }
    });
}

var renderProducts = function(data) {
    $.each(data, function(idx, val) {
        $("#main .columns").append(renderProduct(val));
        setTimeout(() => {
            $("#main .columns .div-content").addClass('div-show');
        }, 10);
    });
}

var renderProduct = function(data) {
    var result = '' +
        '<div class="image fit">' +
            '<a class="div-content" href="/product?id=' + data.id + '"><img src="' + data.image + '" alt="" /></a>' +
        '</div>';
    
    return result;
}
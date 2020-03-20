var url_product = base_ajax + '/user/get-product?id=';

$(document).ready(function() {
    var product_id = getUrlParameter('id');

    if (!product_id) {
        product_id = 0;
    }

    get_product(product_id);
});

var get_product = function(id) {
    getAPI(url_product + id, function(data) {
        if (data && data.length > 0) {
            renderProduct(data[0]);
        }
    });
}

var renderProduct = function(data) {
    $(".product-img").empty().append(renderImage(data));
    $(".product-title").empty().append(renderTitle(data));
    $(".product-detail").empty().append(renderDescription(data));
}

var renderImage = function(data) {
    return '<img src="' + data.image + '" alt="" />';
} 

var renderTitle = function(data) {
    return data.title;
}

var renderDescription = function(data) {
    return data.description;
}

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};

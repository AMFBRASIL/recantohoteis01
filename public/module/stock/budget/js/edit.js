sessionStorage.clear();

$(function ($) {
    $("#enableProducts").change(function () {
        if ($(this).is(':checked')) {
            $('#divValues').show();
        } else {
            $('#divValues').hide();
        }
        $('#sumPrice').html("0,00");
    });

    $(".form-group-item .btn-add-item-product").click(function () {
        let p = $(this).closest(".form-group-item").find(".g-items");
        p.find('.moeda-real').each(function () {
            $(this).mask('#.##0,00', {reverse: true});
        });
    });

    $('.moeda-real').mask('#.##0,00', {reverse: true});

    $('.dungdt-select2-field').each(function () {
        $(this).trigger('select.select2');
    })

    $(document).on('select2:select', '.product-composition .product-detail .dungdt-select2-field-lazy', function (e) {
        console.log(e.params.data)
        let index = $(this).closest('.item').attr('data-number');
        let product_id = e.params.data.id;
        let product = sessionStorage.getItem('product-' + product_id);

        if (product == null || product.index == index) {
            checkIndex(index);
            sessionStorage.setItem('index-' + index, 'product-' + product_id);
            sessionStorage.setItem('product-' + product_id, JSON.stringify({
                index: index,
                id: product_id,
                price: 0,
                qtd: 1
            }));

        } else {
            $(this).closest('.item').remove();
            checkIndex(index);
            alert('Produto já inserido na lista!');
        }

        $(".btn-remove-item-product").click(function () {
            let index = $(this).closest('.item').attr('data-number');
            checkIndex(index);
        });

        $(".sale_quantity").blur(function () {
            let product_id = $(this).closest('.row').find("select option:selected").val();
            let qtd_quantity = parseInt($(this).closest('.row').find('.sale_quantity').val());
            let price = $(this).closest('.row').find('.price').val();

            if (price != ''){
                price = parseFloat(price.replace('.', '').replace(',', '.'));

                let product = JSON.parse(sessionStorage.getItem('product-' + product_id));

                removeItems(price, parseInt(product.qtd));

                product.qtd = qtd_quantity;
                product.price = price;

                sumItems(product.index, price, qtd_quantity);
                sessionStorage.setItem('product-' + product_id, JSON.stringify(product));
            }
        });

        $(".price").blur(function () {
            let product_id = $(this).closest('.row').find("select option:selected").val();
            let qtd_quantity = parseInt($(this).closest('.row').find('.sale_quantity').val());
            let price = $(this).closest('.row').find('.price').val();
            let product = JSON.parse(sessionStorage.getItem('product-' + product_id));

            price = parseFloat(price.replace('.', '').replace(',', '.'));

            removeItems(product.price, qtd_quantity);
            product.qtd = qtd_quantity;
            product.price = price;
            sumItems(product.index, price, qtd_quantity);
            sessionStorage.setItem('product-' + product_id, JSON.stringify(product));
        });
    });
});

function sumItems(index, valueItem, qtdItem) {
    valueItem = parseFloat(valueItem);
    qtdItem = parseInt(qtdItem);

    let valuesAdded = parseFloat($('#sumPrice').text().replace('.', '').replace(',', '.'));
    let valueCalculatedItem = valueItem * qtdItem;

    valuesAdded += valueCalculatedItem;

    showValues(valuesAdded);

    console.log({
        Itens: 'Adiciao',
        valorItem: valueItem,
        qtdItem: qtdItem,
        valoresSomados: valuesAdded,
    })
}

function checkIndex(index) {
    check_index = sessionStorage.getItem('index-' + index);
    check_product = JSON.parse(sessionStorage.getItem(check_index));

    if (check_index != null
        && check_product != null
        && check_product.index == index) {
        removeItems(check_product.price, check_product.qtd);
        sessionStorage.removeItem(check_index);
        sessionStorage.removeItem('index-' + index);
    }
}

function removeItems(valueItem, qtdItem) {
    let valuesAdded = parseFloat(($('#sumPrice').text()).replace('.', '').replace(',', '.'));
    let valueCalculatedItem = valueItem * qtdItem;

    valuesAdded -= valueCalculatedItem;

    if (valuesAdded < 0){
        valuesAdded = 0
    }

    showValues(valuesAdded);
    console.log({
        Itens: 'subtracao',
        valorItem: valueItem,
        qtdItem: qtdItem,
        valoresSomados: valuesAdded,
    })
}

function showValues(valoresSomados) {
    //Input interno somatotal
    $('#sumPrice').html(formatNumber(valoresSomados));
}

function formatNumber(value) {
    if (value != null) {
        return value.toFixed(2).replace('.', ',')
            .replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
    }
}

sessionStorage.clear();
let cash_payment;
let total_value_available = 0.0;
let total_consumed_value = 0.0;
let qtd_Item = 0;

let creditCardPayment = JSON.parse($("#formPayment").attr("data-value"));

let searchUserByName = false;
let searchUserByConsumedCard = false;

$(function ($) {
    $('.moeda-real').on('blur', function () {
        $(this).each(function () {
            $(this).mask('#.##0,00', {reverse: true});
        });
    });

    $('.dungdt-select2-field').each(function () {
        $(this).trigger('select.select2');
    })

    $(document).on('select2:select', '.dungdt-select2-field-lazy', function (e) {

        let index = $(this).closest('.item').attr('data-number');
        let product_id = e.params.data.id;

        let product = sessionStorage.getItem('product-' + product_id);

        if (product == null || product.index == index) {
            if (e.params.data.available_stock == 0) {
                check(index);
                alert('Produto sem estoque disponível!');
                removeInvalidItem(index);
            } else {
                $(this).closest('.row').find('.stock_quantity').val(e.params.data.available_stock);
                $(this).closest('.row').find('.item_name').val(e.params.data.text);
                $(this).closest('.row').find('.sale_quantity').val("1");
                $(this).closest('.row').find('.sale_quantity').attr({
                    "max": e.params.data.available_stock,
                });
                $(this).closest('.row').find('.price').val(e.params.data.price);

                check(index);

                sessionStorage.setItem('index-' + index, 'product-' + product_id);
                sessionStorage.setItem('product-' + product_id, JSON.stringify({
                    index: index,
                    id: product_id,
                    price: e.params.data.price,
                    qtd: 1
                }));

                let product_value = e.params.data.price.replace('.', '').replace(',', '.');

                sumItems(index, product_value, 1)
            }
        } else {
            alert('Produto já inserido na lista!');
            check(index);
            removeInvalidItem(index);
            --qtd_Item;
        }

        $(".btn-remove-item").click(function () {
            let index = $(this).closest('.item').attr('data-number');

            deleteTableItem(index);
        });

        $(".sale_quantity").blur(function () {
            let product_id = $(this).closest('.row').find("select option:selected").val();
            let qtd_stock = parseInt($(this).closest('.row').find('.stock_quantity').val());
            let qtd_quantity = parseInt($(this).closest('.row').find('.sale_quantity').val());
            let price = $(this).closest('.row').find('.price').val();

            price = parseFloat(price.replace('.', '').replace(',', '.'));

            if (qtd_quantity > qtd_stock) {
                qtd_quantity = qtd_stock;
                $(this).closest('.row').find('.sale_quantity').val(qtd_quantity);
            }

            if (qtd_quantity < 1) {
                qtd_quantity = 1;
                $(this).closest('.row').find('.sale_quantity').val(qtd_quantity);
            }

            let valuesAdded = parseFloat(($('#internalSum').val()).replace('.', '').replace(',', '.'));
            let valueCalculatedItem = price * qtd_quantity;

            valuesAdded += valueCalculatedItem;

            if (valuesAdded >= total_value_available) {
                alert("Seu limite de orçamento esgostou. Favor adicionar mais creditos no cartao.");
                check(index)
                removeInvalidItem(index)
            }else{
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

            let valuesAdded = parseFloat(($('#internalSum').val()).replace('.', '').replace(',', '.'));
            let valueCalculatedItem = price * qtd_quantity;

            valuesAdded += valueCalculatedItem;

            if (valuesAdded >= total_value_available) {
                alert("Seu limite de orçamento esgostou. Favor adicionar mais creditos no cartao.");
                check(index)
                removeInvalidItem(index)
            }else{
                removeItems(product.price, qtd_quantity);
                product.qtd = qtd_quantity;
                product.price = price;
                sumItems(product.index, price, qtd_quantity);
                sessionStorage.setItem('product-' + product_id, JSON.stringify(product));
            }

        });

        $('#priceDiscount').blur(function () {
            let discount = parseFloat(($(this).val()).replace('.', '').replace(',', '.'));
            let old_discount = sessionStorage.getItem('desconto');
            let valuesAdded = parseFloat(($('#internalSum').val()).replace('.', '').replace(',', '.'));

            if (discount <= 0 || isNaN(discount)) {
                discount = 0;
                $(this).val(discount);
            } else {
                if (old_discount == null) {
                    sessionStorage.setItem('desconto', discount);
                } else {
                    old_discount = parseFloat(sessionStorage.getItem('desconto'));
                    valuesAdded += old_discount;
                    total_value_available -= old_discount;
                    total_consumed_value += old_discount;
                }

                if (discount > valuesAdded) {
                    discount = 0;
                    $(this).val(discount);
                }

                valuesAdded -= discount;

                total_value_available += discount;
                total_consumed_value -= discount;
                sessionStorage.setItem('desconto', discount);

                /*console.log({
                    desconto: desconto,
                    antigo_desconto: antigo_desconto,
                    valoresSomados: valoresSomados,
                    valor_total_consumido: valor_total_consumido,
                    valor_total_disponivel: valor_total_disponivel
                });*/
                showValues(valuesAdded)
                calculateReceivedValue();
            }
        })

        $('#amountReceived').blur(function () {
            calculateReceivedValue();
        })

        $('.moeda-real').each(function () {
            $(this).mask('#.##0,00', {reverse: true});
        });
    });

    $('#formPayment').on('change', function() {
        showTransitionNumber()
    });

    showTransitionNumber();
});

$("#listSales").click(function () {
    window.location = "/admin/module/pos/sale/";
});

$("#newCard").click(function () {
    window.location = "/admin/module/pos/consumptionCard/";
});

$("#numberCard").focus();

$("#numberCard").blur(function () {
    if ($("#numberCard").val() != "") {
        searchUserByName = false;
        searchUserByConsumedCard = false
        searchUserByConsumerCard();
    }
});

$(".authorizeValues").click(function () {
    let data = {
        password: $('#password').val(),
    };

    let url = "/admin/module/pos/authorizationPassword/check";

    $.ajax({
        url: url,
        type: 'GET',
        data: data,
        success: function (data) {
            alert(data.message);
            if (data.success) {
                $('#passwordAuthorization').modal('toggle');
                $('#enable_products').removeAttr("disabled");
                $('#contentValues').show();
                $('#sumValues').show();
                $('#totalSum').html("R$ 0,00 ");
            }
        }
    });
})

$("#enable_products").change(function () {
    if ($(this).is(':checked')) {
        $('#sumValues').show();
        $('#totalSum').html("R$ 0,00 ");
    } else {
        $('#sumValues').hide();
    }
});

$(".btn-add-item").click(() => {
    qtd_Item += 1;
    /*console.log(qtd_Item);*/
});

let select = $('#client_host').find('.dungdt-select2-field');
select.on('change', (e) => {
    searchUserByName = false;
    searchUserByConsumedCard = false
    searchUserInformation();
});

function searchUserInformation(){
    let user_id = select.val()
    let data = {
        user_id: user_id,
    };
    let url = "/admin/module/booking/getHotelRoomByUserID/";

    $.ajax({
        url: url,
        type: 'GET',
        data: data,
        success: function (data) {
            console.log(data);
            searchUserByName = true;
            setUserInformation(data)
        }
    });
}

function setUserInformation(data){
    if (data.room.length > 0){
        let select = $('#uhCliente');
        select.empty();
        $.each(data.room, function (index, item) {
            select.append(
                new Option(item.title + ' - '+ item.room.number, item.id, null, false));
        });
        select.prop('disabled',false);

        let select2 = $('#dayUse');
        select2.empty();
        select2.prop('disabled',true);
        select2.append(
            new Option('- Selecione -', 0, null, true));

        $("#formPayment option").filter(function() {
            let text = $(this).text().trim().toLowerCase();
            return text.indexOf('hospede checkout') != -1;
        }).removeAttr('disabled');
    }else{
        let select = $('#dayUse');
        select.empty();
        select.prop('disabled',false);
        select.append(
            new Option('DAY USE', 1, null, true));

        let select2 = $('#uhCliente');
        select2.empty();
        select2.prop('disabled',true);
        select2.append(
            new Option('- Selecione -', 0, null, true));

        $("#formPayment option").filter(function() {
            let text = $(this).text().trim().toLowerCase();
            return text.indexOf('hospede checkout') != -1;
        }).attr('disabled', 'disabled')
    }

    if(data.consumptionCard != '' && data.consumptionCard != null){
        $('#numberCard').val(data.consumptionCard.card_number);
        if (!searchUserByConsumedCard){
            searchUserByConsumerCard();
        }
    }else{
        alert("Cliente nao possui cartão consumo. É necessário cadastrar um para continuar.");
    }
}

function showTransitionNumber(){
    if(creditCardPayment.some(item => item.id == $("#formPayment").val())){
        $('#divNSU').show();
        $('#nsuinput').focus();
    } else {
        $('#divNSU').hide();
    }
}

function searchUserByConsumerCard() {
    let data = {
        card_number: $('#numberCard').val(),
    };

    let url = "/admin/module/pos/consumptionCard/findCard";

    $.ajax({
        url: url,
        type: 'GET',
        data: data,
        success: function (data) {
            searchUserByConsumedCard = true;
            if (data.success) {
                /*console.log(data);*/
                let select = $('#client_host').find('.dungdt-select2-field');
                let name = data.cardData.user.first_name + ' ' + data.cardData.user.last_name

                select.append(
                    new Option(name, data.cardData.user.id, null, true));

                total_value_available = data.cardData.card.value_card;
                total_value_available = parseFloat(total_value_available);

                $('#totalValue').html(formatNumber(total_value_available));

                if (data.cardData.card.value_consumed == null) {
                    $('#valueRemaining').html('0.00');
                } else {
                    total_consumed_value = data.cardData.card.value_consumed;
                    total_consumed_value = parseFloat(total_consumed_value);

                    $('#valueRemaining').html(formatNumber(total_consumed_value));
                }
                cash_payment = data.cardData.cash_payment;

                $('#passwordAuthorization').modal('show');

                if (!searchUserByName){
                    searchUserInformation();
                }
            } else {
                alert(data.message);
            }
        }
    });
}

function calculateReceivedValue(){
    let amountReceived = parseFloat(($('#amountReceived').val()).replace('.', '').replace(',', '.'));
    let valuesAdded = parseFloat(($('#internalSum').val()).replace('.', '').replace(',', '.'));

    if (!isNaN(amountReceived) && amountReceived > 0) {
        let totalSum = valuesAdded - amountReceived;

        $('#priceExchange').val(formatNumber(totalSum * (-1)));
    }
}

function sumItems(index, valueItem, qtdItem) {
    valueItem = parseFloat(valueItem).toFixed(2);
    qtdItem = parseInt(qtdItem);

    let valuesAdded = parseFloat(($('#internalSum').val()).replace('.', '').replace(',', '.'));
    let valueCalculatedItem = valueItem * qtdItem;

    valuesAdded += valueCalculatedItem;

    if (valuesAdded >= total_value_available) {
        alert("Seu limite de orçamento esgostou. Favor adicionar mais creditos no cartao.");
        check(index)
        removeInvalidItem(index)

        /*console.log({
            Itens: 'invalid',
            valorItem: valorItem,
            qtdItem: qtdItem,
            valorCalculadoItem: valorCalculadoItem,
            valoresSomados: valoresSomados,
            valorTotalConsumido: valor_total_consumido,
            valorTotalDisponivel: valor_total_disponivel
        })*/
    }else {
        total_consumed_value += valueCalculatedItem;
        total_value_available -= valueCalculatedItem;

        showValues(valuesAdded);
        calculateReceivedValue();
        /*console.log({
             Itens: 'soma',
             valorItem: valueItem,
             qtdItem: qtdItem,
             valorCalculadoItem: valueCalculatedItem,
             valoresSomados: valuesAdded,
             valorTotalConsumido: total_consumed_value,
             valorTotalDisponivel: total_value_available
         })*/
    }
}

function check(index) {
    check_index = sessionStorage.getItem('index-' + index);
    check_product = JSON.parse(sessionStorage.getItem(check_index));

    console.log(check_product)

    if (check_index != null
        && check_product != null
        && check_product.index == index) {
        removeItems(check_product.price, check_product.qtd);
        sessionStorage.removeItem(check_index);
        sessionStorage.removeItem('index-' + index);
        --qtd_Item;
    }
}

function removeItems(valueItem, qtdItem) {
    valueItem = String(valueItem).replace(',', '.');
    valueItem = parseFloat(valueItem).toFixed(2);
    qtdItem = parseInt(qtdItem);

    let valuesAdded = parseFloat(($('#internalSum').val()).replace('.', '').replace(',', '.')).toFixed(2);
    let valueCalculatedItem = valueItem * qtdItem;

    valuesAdded -= valueCalculatedItem;
    total_consumed_value -= valueCalculatedItem;
    total_value_available += valueCalculatedItem;

    showValues(valuesAdded);
    console.log({
        Itens: 'subtracao',
        valorItem: valueItem,
        qtdItem: qtdItem,
        valorCalculadoItem: valueCalculatedItem,
        valoresSomados: valuesAdded,
        valorTotalConsumido: total_consumed_value,
        valorTotalDisponivel: total_value_available
    })
}

function showValues(valoresSomados) {
    /* console.log({
         text : 'gravando',
         valoresSomados : valoresSomados,
         valor_total_disponivel : valor_total_disponivel,
         valor_total_consumido :  valor_total_consumido
     })*/

    //Input interno somatotal
    $('#internalSum').val(formatNumber(valoresSomados));

    //Valor Total com Desconto
    $('#totalSum').html("R$ " + formatNumber(valoresSomados));

    //Valor total Disponivel
    $('#totalValue').html(formatNumber(total_value_available));
    $('#sumTotalCard').val(formatNumber(total_value_available));

    //valor total consumido
    $('#valueRemaining').html(formatNumber(total_consumed_value));
    $('#sumTotalCardConsumer').val(formatNumber(total_consumed_value));
}

function deleteTableItem(index){
    check(index);

    if (qtd_Item == 0) {
        let desconto = parseFloat(($('#priceDiscount').val()).replace('.', '').replace(',', '.'));
        let valoresSomados = parseFloat(($('#internalSum').val()).replace('.', '').replace(',', '.'));

        if (desconto > 0) {
            valoresSomados = desconto + valoresSomados;
            total_value_available = total_value_available - desconto;
            total_consumed_value = total_consumed_value + desconto;
            sessionStorage.removeItem('desconto');
            showValues(valoresSomados)
        }

        $('#priceDiscount').val(formatNumber(0));
        $('#amountReceived').val(formatNumber(0));
        $('#priceExchange').val(formatNumber(0));
    }
    calculateReceivedValue();
}

function removeInvalidItem(index) {
    $('.item')[index].remove();
}

function formatNumber(value) {
    if (value != null) {
        return value.toFixed(2).replace('.', ',')
            .replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
    }
}

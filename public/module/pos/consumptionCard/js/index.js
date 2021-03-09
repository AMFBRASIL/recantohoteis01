let sales;
let current_page = 1;
let rows = 10;
let max_page = 1;

let creditCardPayment = JSON.parse($("#formPayment").attr("data-value"));

$(function ($) {
    $(".dungdt-select2-field").prop('required',true);

    $("#observacao").on("show.bs.modal", function (e) {
        let observacao = e.relatedTarget.getAttribute('data-value');
        $('#internal_observations').html(observacao);
    });

    $("#product").on("show.bs.modal", function (e) {
        clearModalEmUso();
        let id = e.relatedTarget.getAttribute('data-value');
        let data = {
            id: id,
        };

        let url = "/admin/module/pos/sale/getSalesCard";

        $.ajax({
            url: url,
            type: 'GET',
            data: data,
            success: function (data) {
                sales = data;
                loadModalSale();
                if(sales.itensSales.length >= 1){
                    loadTableModalSale(sales.itensSales, rows, current_page);
                    SetupPagination(sales.itensSales, rows);
                }
            }
        });
    });

    $('#formPayment').on('change', function() {
        showTransitionNumber()
    });

    showTransitionNumber();
});

$('.moeda-real').mask('#.##0,00', {reverse: true});

$(".dungdt-select2-field").on('change', (e) => {

    let user_id = $(".dungdt-select2-field").val()
    let data = {
        user_id: user_id,
    };
    let url = "/admin/module/booking/getHotelRoomByUserID/";

    console.log(user_id)
    $.ajax({
        url: url,
        type: 'GET',
        data: data,
        success: function (data) {
            console.log(data);

            if (data.room.length > 0){
                let select = $('#uhCliente');
                select.empty();
                $.each(data.room, function (index, item) {
                    /*f(item.id == room_id){
                        select.append(
                            new Option(item.number, item.id, null, true));
                    }else{
                        select.append(
                            new Option(item.number, item.id, null, false));
                    }*/
                    select.append(
                        new Option(item.number, item.id, null, false));
                });
                select.prop('disabled',false);

                let select2 = $('#dayUse');
                select2.empty();
                select2.prop('disabled',true);
                select2.append(
                    new Option('-- Selecione Day Use Mode --', 0, null, true));

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
                    new Option('-- Selecione a UH --', 0, null, true));

                $("#formPayment option").filter(function() {
                    let text = $(this).text().trim().toLowerCase();
                    return text.indexOf('hospede checkout') != -1;
                }).attr('disabled', 'disabled')
            }
        }
    });
});

$('#priceAdd').on('keyup', function () {
    $("#somaValores").show();

    let priceAdd = $('#priceAdd').val();

    if (priceAdd == '') {
        $("#somaValores").hide();
    }

    // Somando valores
    let totalValores = priceAdd;
    let totalValoresCobrar = priceAdd;

    $('#somaTotal').html("R$ " + totalValores);
    $('#somaTotalCobrar').html("R$ " + totalValoresCobrar);
})

$("#pagination-sales").on('click', 'li a', function () {
    let itens = sales.itensSales;

    let capturedValue = $(this).text();

    switch (capturedValue) {
        case '<<':
            current_page--;
            break;
        case '>>':
            current_page++;
            break;
        default:
            current_page = capturedValue;
            break;
    }

    if(current_page > 1){
        $("#anterior").closest('li').removeClass("disabled")
    }else{
        $("#anterior").closest('li').addClass("disabled")
    }

    if(current_page == max_page){
        $("#proximo").closest('li').addClass("disabled")
    }else{
        $("#proximo").closest('li').removeClass("disabled")
    }

    loadTableModalSale(itens, rows, current_page);

    activePagination();
})

function clearModalEmUso(){
    $("#tab-sales tr").remove();
    $("#pagination-sales li").remove();
    $("#modal-card-title").html(``);
    $("#card").html(``);
    $("#value-consumed-modal-em-uso").html(``);
    $("#value-card-modal-em-uso").html(`<i `);
}

function activePagination(){
    $("#pagination-sales li").removeClass("active");
    $(`#pagination-sales li a:contains(${current_page})`).closest('li').addClass("active");
}

function loadModalSale() {
    $("#modal-card-title").html(`Detalhes Consumo Cartão : #${sales.card.id}`);
    $("#card").html(`Itens Consumido Cartão (#${sales.card.id})`);

    $("#value-consumed-modal-em-uso").html(`<i class="fa fa-minus"></i> R$ ${sales.card.value_consumed != null
        ? sales.card.value_consumed : '0.00'}`);
    $("#value-card-modal-em-uso").html(`<i class="fa fa-plus"></i> R$ ${sales.card.value_card}`);
}

function loadTableModalSale(items, rows_per_page, page) {
    page--;

    let html = '';
    let start = rows_per_page * page;
    let end = start + rows_per_page;
    let paginatedItems = items.slice(start, end)

    for (let i = 0; i < paginatedItems.length; i++) {
        let item = paginatedItems[i];

        html += ` <tr>
                            <td><i class="fa fa-check-circle fa-2x"></i></td>
                            <td>#${item.sale_id}</td>
                            <td>${item.title}</td>
                            <td>R$ ${item.price}</td>
                            <td>${item.quantity}</td>
                            <td>${item.created_at}</td>
                         </tr>`
    }
    $("#tab-sales > tbody:last-child").html(html);
}

function SetupPagination(items, rows_per_page) {
    let html = '';
    let page_count = Math.ceil(items.length / rows_per_page);

    max_page = page_count

    html += `<li class="page-item disabled">
                        <a class="page-link" id="anterior" href="#" aria-label="Previous"><<</a>
                    </li>`;

    for (let i = 1; i < page_count + 1; i++) {
        html += PaginationButton(i);
    }

    html += `<li class="page-item ${max_page == 1 ? 'disabled' : 0}">
                        <a id="proximo" class="page-link" href="#" aria-label="Next">>></a>
                    </li>`;

    $("#pagination-sales").html(html);
}

function PaginationButton(page) {
    let html = '';

    if (current_page == page) {
        html += `<li class="page-item active" aria-current="page">
                            <a class="page-link" href="#">${page}</a>
                        </li>`
    } else {
        html += `<li class="page-item">
                            <a class="page-link" href="#">${page}</a>
                        </li>`
    }
    return html;
}

function showTransitionNumber(){
    if(creditCardPayment.some(item => item.id == $("#formPayment").val())){
        $('#divNSU').show();
        $('#nsuinput').focus();
    } else {
        $('#divNSU').hide();
    }
}

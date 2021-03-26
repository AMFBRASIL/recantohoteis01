let sale;
let current_page = 1;
let rows = 10;
let max_page = 1;

$(function ($) {
    $("#observation").on("show.bs.modal", function (e) {
        let observacao = e.relatedTarget.getAttribute('data-value');
        $('#internal_observations').html(observacao);
    });

    $(".client > a").on('click', (e) => {
        $(".user-information").empty();
        let id = e.target.getAttribute("data-value");
        let data = {
            id: id,
        };

        let url = "/admin/module/user/getUser";

        $.ajax({
            url: url,
            type: 'GET',
            data: data,
            success: function (data) {
                $("#client").modal('show');
                loadModalClient(data);
            }
        });
    });

    $(".card-modal-open > a").on('click', (e) => {
        $(".card-modal-body").empty();
        let card_number = e.target.getAttribute("data-value");
        let data = {
            card_number: card_number,
        };

        let url = "/admin/module/pos/consumptionCard/findCard";

        $.ajax({
            url: url,
            type: 'GET',
            data: data,
            success: function (data) {
                $("#card").modal('show');
                $(".card-title").html("Detalhes do Uso do Cartao #" + data.cardData.card.card_number);
                loadModalDetailsConsumer(data);
            }
        });
    });

    $(".productSituation > a").on('click', (e) => {
        let id = e.target.getAttribute('data-value');
        let data = {
            id: id,
        };

        let url = "/admin/module/pos/sale/getSales";

        $.ajax({
            url: url,
            type: 'GET',
            data: data,
            success: function (data) {
                $("#productSituation").modal('show');
                sale = data
                loadModalSaleSituation();
                loadTableModalSaleSituation(sale.sale.product_composition);
            }
        });
    });

    $(".product > a").on('click', (e) => {
        let id = e.target.getAttribute('data-value');
        let data = {
            id: id,
        };

        let url = "/admin/module/pos/sale/getSales";

        $.ajax({
            url: url,
            type: 'GET',
            data: data,
            success: function (data) {
                $("#product").modal('show');
                sale = data
                loadModalSale();
                loadTableModalSale(sale.sale.product_composition, rows, current_page);
                SetupPagination(sale.sale.product_composition, rows);
            }
        });
    });
});

$("#pagination-sales").on('click', 'li a', function () {
    let itens = sale.sale.product_composition;

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

    if (current_page > 1) {
        $("#anterior").closest('li').removeClass("disabled")
    } else {
        $("#anterior").closest('li').addClass("disabled")
    }

    if (current_page == max_page) {
        $("#proximo").closest('li').addClass("disabled")
    } else {
        $("#proximo").closest('li').removeClass("disabled")
    }

    loadTableModalSale(itens, rows, current_page);

    activePagination();
})

function loadModalDetailsConsumer(data) {
    let html = `
                <div class="modal-body">
                    <div class="container mt-5 mb-5">
                        <div class="row g-0">
                            <div class="col-md-8 border-right">
                                <div class="p-1 bg-white">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="heading1"> Detalhes do Uso do Cartao  #${data.cardData.card.card_number}</h6>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    Situação:
                                                    <strong> ${data.cardData.situation}</strong><br>
                                                    Type Card: <strong> ${data.cardData.card.day_user == 1 ? 'DAY USE' : 'HÓSPEDE'} </strong><br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    ${data.cardData.user.first_name + ' ' + data.cardData.user.last_name}<br>`;

    if (data.cardData.user.business_name != null) {
        html += ` ${'Company: ' + data.cardData.user.business_name}<br>`;
    }

    if (data.cardData.user.address != null) {
        html += `${data.cardData.user.address}`;
    }

    if (data.cardData.user.address2 != null) {
        html += `${', ' + data.cardData.user.address2}<br>`;
    }

    if (data.cardData.user.city != null && data.cardData.user.state != null && data.cardData.user.zip_code != null) {
        html += `${data.cardData.user.city + ' - ' + data.cardData.user.state + ' - CEP: ' + data.cardData.user.zip_code}<br>`;
    }

    html += `${'Phone : ' + data.cardData.user.phone}}<br>
                                                    ${'E-mail : ' + data.cardData.user.email}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <div class="col-md-4">
                <div class="p-3 bg-white">
                <h6 class="account"><b>Valor Total Consumido</b></h6>
                    <span class="mt-5 restante moeda-real">
                         <i class="fa fa-minus "></i> R$ ${data.cardData.card.value_consumed == null ? '0.00' : data.cardData.card.value_consumed} </span>
                                    </div>
                                    <div class="p-2 py-2 bg-white">
                                        <div class="p-2 bg-white">
                                            <h6 class="account"><b>Valor Total Disponível</b></h6> <span class="mt-5 balance"> <i
                                                    class="fa fa-plus"></i> R$ ${data.cardData.card.value_card} </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <span class="btn btn-secondary" data-dismiss="modal">FECHAR</span>
                        </div>
                    </div>`;

    $(".card-modal-body").html(html);
}

function loadModalClient(data) {
    let html = `<ul>
                            <li class="info-first-name">
                                <div class="label">Primeiro nome</div>
                                <div class="val">${data.user.first_name != null ? data.user.first_name : ''}</div>
                            </li>
                            <li class="info-last-name">
                                <div class="label">Sobrenome</div>
                                <div class="val">${data.user.last_name != null ? data.user.last_name : ''}</div>
                            </li>
                            <li class="info-email">
                                <div class="label">Email</div>
                                <div class="val">${data.user.email != null ? data.user.email : ''}</div>
                            </li>
                            <li class="info-phone">
                                <div class="label">Telefone</div>
                                <div class="val">${data.user.phone != null ? data.user.phone : ''}</div>
                            </li>
                            <li class="info-address">
                                <div class="label">Endereço</div>
                                <div class="val">${data.user.address != null ? data.user.address : ''}</div>
                            </li>
                            <li class="info-address2">
                                <div class="label">Address line 2</div>
                                <div class="val">${data.user.address2 != null ? data.user.address2 : ''}</div>
                            </li>
                            <li class="info-city">
                                <div class="label">Cidade</div>
                                <div class="val">${data.user.city != null ? data.user.city : ''}</div>
                            </li>
                            <li class="info-state">
                                <div class="label">Estado / Província / Região</div>
                                <div class="val">${data.user.state != null ? data.user.state : ''}</div>
                            </li>
                            <li class="info-zip-code">
                                <div class="label">Cep / Código postal</div>
                                <div class="val">${data.user.zip_code != null ? data.user.zip_code : ''}</div>
                            </li>
                            <li class="info-country">
                                <div class="label">País</div>
                                <div class="val">${data.user.country != null ? data.user.country : ''}</div>
                            </li>
                            <li class="info-notes">
                                <div class="label">Solicitações extra da reserva</div>
                                <div class="val"></div>
                            </li>
                       </ul>`;
    $(".user-information").html(html);
}

function activePagination() {
    $("#pagination-sales li").removeClass("active");
    $(`#pagination-sales li a:contains(${current_page})`).closest('li').addClass("active");
}

function loadModalSale() {
    $("#modal-sales-title").html(`Detalhes dos Itens da Venda : #${sale.sale.id}`);
    $("#sale-total-no-discounts").html(`<i class="fa fa-minus"></i> R$ ${(parseFloat(sale.sale.total_value)
    + parseFloat(sale.sale.discounts_value)).toFixed(2)}`);
    $("#sale-value-discounts").html(`<i class="fa fa-plus"></i> R$ ${sale.sale.discounts_value}`);
    $("#sale-total-value").html(`<i class="fa fa-minus"></i> R$ ${sale.sale.total_value}`);
    $("#sale-value-card").html(`<i class="fa fa-plus"></i> R$ ${sale.card.value_card}`);
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
                            <td>${item.title}</td>
                            <td>R$ ${item.price}</td>
                            <td>${item.quantity}</td>
                            <td>${sale.created_at}</td>
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

function loadModalSaleSituation() {
    $("#title-sales-situation-modal").html(`Itens do Pedido nro: : #${sale.sale.id}`);
    $("#value-sales-situation-modal").html(`R$ ${sale.sale.total_value}`);
}

function loadTableModalSaleSituation(items) {
    let html = '';
    for (let i = 0; i < items.length; i++) {
        let item = items[i];

        html += ` <tr>
                    <td>${item.title}</td>
                    <td>R$ ${item.price}</td>
                    <td>${item.quantity}</td>`;
        if (item.situation_name != undefined) {
            html += `<td><span class="badge badge-${item.situation_label}">${item.situation_name}</span></td>`;
        } else {
            html += `<td><span></span></td>`;
        }
        html += `    <td>${sale.created_at}</td>
                 </tr>`;
    }
    $("#table-items-sales-situation-modal > tbody:last-child").html(html);
}

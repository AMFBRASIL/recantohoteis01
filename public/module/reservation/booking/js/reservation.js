let bookingSelect = null;

$(function ($) {
    $('.moeda-real').on('blur', function () {
        $(this).each(function () {
            $(this).mask('#.##0,00', {reverse: true});
        });
    });

    $(".modal-booking-summary").on('click',(e)=>{
        openDetailBooking(e);
    });

    $(".action-detail").on('click', (e)=>{
        openDetailBooking(e);
    });

    $(".modal-client > a").on('click', (e) => {
        $(".user-information").empty();
        let id = e.target.getAttribute("data-value");
        let data = {
            booking_id: id,
        };

        let url = "/admin/module/booking/getUserBooking";

        $.ajax({
            url: url,
            type: 'GET',
            data: data,
            success: function (data) {
                if(!data.error){
                    $("#client").modal('show');
                    loadModalClient(data);
                }else{
                    alert(data.message);
                }
            }
        });
    });

    $(".modal-guest").on('click',(e)=>{
        let id = e.target.getAttribute("data-value");
        let data = {
            booking_id: id,
        };

        let url = "/admin/module/booking/getUserBooking";

        $.ajax({
            url: url,
            type: 'GET',
            data: data,
            success: function (data) {
                if(!data.error){
                    $("#guest").modal('show');
                    loadModalGuest(data);
                }else{
                    alert(data.message);
                }
            }
        });
    });

    $(".modal-value").on('click',(e)=>{
        let id = e.target.getAttribute("data-value");
        let data = {
            booking_id: id,
        };

        let url = "/admin/module/booking/getUserBooking";

        $.ajax({
            url: url,
            type: 'GET',
            data: data,
            success: function (data) {
                if (data.error) {
                    alert(data.message);
                }else{
                    bookingSelect = data.booking;
                    openModalPayment(false);
                    setTimeout(()=>{
                        $("#value").modal('show');
                    },1650);
                }
            }
        });
    });

    $(".action-validation").on('click', (e)=>{
        let data = {
            booking_id: e.target.getAttribute("data-value"),
        };

        let url = "/admin/module/booking/getUserBooking/";

        bookingSelect = null;

        $.ajax({
            url: url,
            type: 'GET',
            data: data,
            success: function (data) {
                if (data.error) {
                    alert(data.message);
                } else {
                    bookingSelect = data.booking;
                    $("#validation").modal('show');
                    loadModalValidation();
                }
            }
        });
    });

    $(".salveValidation").on('click', ()=>{
        let data = {
            is_contract: $("#checkEntregue").is(":checked") ? 1 : 0,
            contract_name: $("#entreguePara").val(),
            is_signature: $("#checkAssinado").is(":checked") ? 1 : 0,
            signature_name: $("#assinador").val(),
            is_commission: $("#checkComissao").is(":checked") ? 1 : 0,
            commission: parseFloat($("#vlrPagoCommission").val().replace(/[.]/g, '').replace(',', '.')).toFixed(2),
            booking_id: bookingSelect.id
        };

        let url = "/admin/module/reservation/booking/saveValidation";

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function (data) {
                if (!data.success) {
                    alert(data.message);
                }else{
                    $("#validation").modal('hide');
                    window.location.href = "/admin/module/reservation/booking/saveValidationIndex";
                }
            }
        });
    })

    $(".action-payment").on('click', (e)=>{
        let data = {
            booking_id: e.target.getAttribute("data-value"),
        };

        let url = "/admin/module/booking/getUserBooking/";

        $.ajax({
            url: url,
            type: 'GET',
            data: data,
            success: function (data) {
                if (data.error) {
                    alert(data.message);
                }else{
                    bookingSelect = data.booking;
                    openModalPayment(true);
                    setTimeout(()=>{
                        $("#payment").modal('show');
                    },1650);
                }
            }
        });
    });

    $(".salvePayment").on('click', ()=>{
        let data = {
            payment_value: parseFloat($('#payment_value').val().replace(/[.]/g, '').replace(',', '.')).toFixed(2),
            payment_method: $("#payment_method").val(),
            payment_type_rate: $("#payment_type_rate").val(),
            transaction_number: $("#transaction_number").val(),
            booking_id: bookingSelect.id
        };

        let url = "/admin/module/reservation/booking/savePaymentHistory";

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function (data) {
                if (!data.success) {
                    alert(data.message);
                }else{
                    $("#payment").modal('hide');
                    window.location.href = "/admin/module/reservation/booking/savePaymentHistoryIndex";
                }
            }
        });
    })
});

function openDetailBooking(e){
    let data = {
        booking_id: e.target.getAttribute("data-value"),
    };

    let url = "/admin/module/booking/getBooking/";

    $.ajax({
        url: url,
        type: 'GET',
        data: data,
        success: function (data) {
            if (data.success) {
                $("#booking_summary").modal('show');
                loadModalDetailBooking(data.data);
            } else {
                alert(data.message);
            }
        }
    });
}

function loadModalDetailBooking(data) {
    $("#title-booking-modal").html(`Detalhes da Reserva Nro: #${data.booking_id}`);

    if (data.booking_type == 'hotel'){
        $('.is_hotel').hide();
    }else{
        $('.is_hotel').show();

        $(".booking_summary_contract").attr("href", `/admin/module/booking/print/contrato/${data.booking_id}`);
    }

    html = `<tr class="text-center">
                        <th width="500px">Booking details</th>
                        <th width="50%">Billing address</th>
                    </tr>
                     <tr>
                        <td>
                            Check-in <strong>${data.booking_detail.checkin}</strong><br>
                            Check-out <strong>${data.booking_detail.checkout}</strong><br>
                            Noites : <strong>${data.booking_detail.nights}</strong><br>
                            Adults : <strong>${data.booking_detail.adults}</strong> <br>
                            Kids : <strong>${data.booking_detail.children}</strong><br>
                            <b>Status:</b> <span class="badge badge-${data.booking_detail.status.label}">${data.booking_detail.status.name}</span>
                        </td>
                        <td>
                            ${data.billing.name}<br>
                            ${data.billing.company != '' ? 'Company: ' + data.billing.company + '<br>' : ''}
                            ${data.billing.address}<br>
                            ${data.billing.complement}<br>
                            Phone: ${data.billing.phone}<br>
                            E-mail : ${data.billing.email}
                        </td>
                     </tr>`;

    $("#information-booking-modal > tbody").html(html);

    html = `<tr class="text-center">
                        <th width="40%">Room</th>
                        <th width="40%">Persons</th>
                        <th width="200px">Total</th>
                    </tr>
                    <tr>
                        <td>${data.room_information.room}</td>
                        <td>${data.room_information.persons} Pessoas (${data.room_information.adults} x Adultos )</td>
                        <td class="text-right">R$ ${data.room_information.total}</td>
                    </tr>`;

    $("#information-room-booking-modal > tbody").html(html);


    html = `<tr class="text-center">
                        <th width="40%">Serviços/Produtos</th>
                        <th width="40%">Quantidade</th>
                        <th width="200px">Total</th>
                    </tr>`;

    for (let i = 0; i < data.itemsSales.length; i++) {
        let item = data.itemsSales[i];
        html += ` <tr>
                            <td>${item.title}</td>
                            <td>${item.quantity}</td>
                            <td  class="text-right">R$ ${item.price}</td>
                         </tr>`;
    }
    $("#table-services-booking-modal > tbody").html(html);


    html = `<tr class="text-center">
                        <th class="text-right" width="80%">DESCONTO</th>
                        <td class="text-right" width="200px">R$ 88,99</td>
                    </tr>
                    <tr>
                        <th class="text-right">Impostos e Taxas (5%)</th>
                        <td class="text-right">R$ 226.73</td>
                    </tr>
                    <tr>
                        <th class="text-right">Pago em ( Cartão VISA )</th>
                        <td class="text-right">R$ 1.900,00</td>
                    </tr>
                    <tr>
                        <th class="text-right">Total (incl. tax)</th>
                        <td class="text-right"><b><span class="mt-5 restante"> R$ 5.984,00  </span></b></td>
                    </tr>`;

    $("#table-values-booking-modal > tbody").html(html);
}

function loadModalClient(data) {

    $('#user-title').html(`Detalhes do Cliente Principal da Reserva #${data.booking.id}`)

    let html = `<ul>
                            <li class="info-first-name">
                                <div class="label">Primeiro nome</div>
                                <div class="val">${data.booking.first_name != null ? data.booking.first_name : ''}</div>
                            </li>
                            <li class="info-last-name">
                                <div class="label">Sobrenome</div>
                                <div class="val">${data.booking.last_name != null ? data.booking.last_name : ''}</div>
                            </li>
                            <li class="info-email">
                                <div class="label">Email</div>
                                <div class="val">${data.booking.email != null ? data.booking.email : ''}</div>
                            </li>
                            <li class="info-phone">
                                <div class="label">Telefone</div>
                                <div class="val">${data.booking.phone != null ? data.booking.phone : ''}</div>
                            </li>
                            <li class="info-address">
                                <div class="label">Endereço</div>
                                <div class="val">${data.booking.address != null ? data.booking.address : ''}</div>
                            </li>
                            <li class="info-address2">
                                <div class="label">Address line 2</div>
                                <div class="val">${data.booking.address2 != null ? data.booking.address2 : ''}</div>
                            </li>
                            <li class="info-city">
                                <div class="label">Cidade</div>
                                <div class="val">${data.booking.city != null ? data.booking.city : ''}</div>
                            </li>
                            <li class="info-state">
                                <div class="label">Estado / Província / Região</div>
                                <div class="val">${data.booking.state != null ? data.booking.state : ''}</div>
                            </li>
                            <li class="info-zip-code">
                                <div class="label">Cep / Código postal</div>
                                <div class="val">${data.booking.zip_code != null ? data.booking.zip_code : ''}</div>
                            </li>
                            <li class="info-country">
                                <div class="label">País</div>
                                <div class="val">${data.booking.country != null ? data.booking.country : ''}</div>
                            </li>
                            <li class="info-notes">
                                <div class="label">Solicitações extra da reserva</div>
                                <div class="val">${data.booking.customer_notes != null ? data.booking.customer_notes : ''}</div>
                            </li>
                       </ul>`;
    $(".user-information").html(html);
}

function loadModalGuest(data){
    console.log(data);
}

function loadModalValue(data){
    console.log(data)
}

function loadModalValidation(){
    if(bookingSelect.is_contract == 1){
        $("#checkEntregue").prop( "checked", true );
        $('#checkEntregue').bootstrapToggle('on')
        $("#contratoEntregue").show();
        $("#contratoEntregue h3").html(new moment(bookingSelect.contract_date).format('DD/MM/YYYY HH:mm:ss'));
        $("#entreguePara").val(bookingSelect.contract_name);
    }else{
        $("#checkEntregue").prop( "checked", false );
        $('#checkEntregue').bootstrapToggle('off')
        $("#contratoEntregue").hide();
        $("#entreguePara").val('');
        $("#contratoEntregue h3").html(new moment().format('DD/MM/YYYY HH:mm:ss'));
    }

    if(bookingSelect.is_signature == 1){
        $("#checkAssinado").prop( "checked", true );
        $('#checkAssinado').bootstrapToggle('on')
        $("#assinadoContrato").show();
        $("#assinadoContrato h3").html(new moment(bookingSelect.signature_date).format('DD/MM/YYYY HH:mm:ss'));
        $("#assinador").val(bookingSelect.signature_name);
    }else{
        $("#checkAssinado").prop( "checked", false );
        $('#checkAssinado').bootstrapToggle('off')
        $("#assinadoContrato").hide();
        $("#assinador").val('');
        $("#assinadoContrato h3").html(new moment().format('DD/MM/YYYY HH:mm:ss'));
    }

    if(bookingSelect.is_commission == 1){
        $("#checkComissao").prop( "checked", true );
        $('#checkComissao').bootstrapToggle('on')
        $("#paymentCampos").show();
        $("#paymentCampos h3").html(new moment(bookingSelect.commission_date).format('DD/MM/YYYY HH:mm:ss'));
        $("#vlrPagoCommission").val(formatNumber(parseFloat(bookingSelect.commission)));
    }else{
        $("#checkComissao").prop( "checked", false );
        $('#checkComissao').bootstrapToggle('off')
        $("#paymentCampos").hide();
        $("#vlrPagoCommission").val('');
        $("#paymentCampos h3").html(new moment().format('DD/MM/YYYY HH:mm:ss'));
    }
}

function openModalPayment(addValue){
    let data = {
        booking_id: bookingSelect.id,
    };

    let url = "/admin/module/booking/getBookingHistory";

    $.ajax({
        url: url,
        type: 'GET',
        data: data,
        success: function (data) {
            if(!data.error){
                loadModalPaymentInformation(addValue);
                loadTableModalPayment(data.bookingPaymentHistory);
            }else{
                alert(data.message);
            }
        }
    });
}

function loadModalPaymentInformation(addValue) {
    $('#payment_value').val('');

    let addValueIndent = addValue ? '_add' : '';

    let valorTotal = parseFloat(bookingSelect.total);
    valorTotal = formatNumber(valorTotal);

    let valorRestante = parseFloat(bookingSelect.paid);
    let valorPago = parseFloat(bookingSelect.total) - parseFloat(bookingSelect.paid);

    $(".value_booking").html(`R$ ${valorTotal}`);

    $(`.value_pay_s${addValueIndent}`).html(`<i class="fa fa-plus"> </i>R$ <span class="mt-5 value_pay${addValueIndent}">0,00</span>`);
    if (valorPago != null && valorPago > 0) {
        valorPago = formatNumber(valorPago);
        $(`.value_pay_s${addValueIndent}`).html(`<i class="fa fa-plus"> </i> R$ <span class="mt-5 value_pay${addValueIndent}">${valorPago}</span>`);
    }

    $(`.value_paid_s${addValueIndent}`).html(`<i class='fa fa-minus'></i> R$ <span class="mt-5 value_paid${addValueIndent}">0,00</span>`);
    if (valorRestante != null && valorRestante > 0) {
        valorRestante = formatNumber(valorRestante);
        $(`.value_paid_s${addValueIndent}`).html(`<i class='fa fa-minus'></i> R$ <span class="mt-5 value_paid${addValueIndent}">${valorRestante}</span>`);
    }
}

function loadTableModalPayment(items) {
    let html = '';
    for (let i = 0; i < items.length; i++) {
        let item = items[i];

        let value = parseFloat(item.payment_value).toFixed(2);
        value = Intl.NumberFormat('pt-BR').format(value);

        html += `<tr>
                    <td><i class="fa fa-dollar fa-2x"></i></td>
                    <td>${item.payment_type_rate.name}</td>
                    <td><b>R$ <span class="moeda-real">${value}</span></b></td>
                    <td>${item.payment_method.name}</td>
                    <td>${new moment(item.created_at).format('DD/MM/YYYY')}</td>
                </tr>`;
    }
    $(".table-items-payment-modal > tbody:last-child").html(html);
}

function formatNumber(value) {
    if (value != null) {
        return value.toFixed(2).replace('.', ',')
            .replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
    }
}

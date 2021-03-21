$(function ($) {
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
                if(!data.error){
                    $("#value").modal('show');
                }else{
                    alert(data.message);
                }
            }
        });
    });
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
                        <td class="text-right"><b>R$ 5.478,63</b></td>
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

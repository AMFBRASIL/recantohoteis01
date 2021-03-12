$(document).ready(function () {
    $(".booking_summary > a").on('click',(e)=>{
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
    });
});

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
                        <td>${data.room_information.persons} Pessoas ( x Adultos )</td>
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

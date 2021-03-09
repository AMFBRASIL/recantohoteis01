let creditCardPayment = JSON.parse($("#formPayment").attr("data-value"));

$(function ($) {
    $("#observacao").on("show.bs.modal", function (e) {
        let observacao = e.relatedTarget.getAttribute('data-value');
        $('#internal_observations').html(observacao);
    });

    $('#formPayment').on('change', function() {
        showTransitionNumber()
    });

    showTransitionNumber();
});

function showTransitionNumber(){
    if(creditCardPayment.some(item => item.id == $("#formPayment").val())){
        $('#divNSU').show();
        $('#nsuinput').focus();
    } else {
        $('#divNSU').hide();
    }
}

$('.novo-cartao-consumo').click(function () {
    window.location.href = "{{route('pos.admin.consumption.card.index')}}";
});

$('.moeda-real').mask('#.##0,00', {reverse: true});

$('#priceAdd').on('keyup', function () {

    $("#somaValores").show();

    let getpriceRestante = $('#priceRestante').val().replace(/[.]/g, '').replace(',', '.');
    let getpriceAdd = $('#priceAdd').val().replace(/[.]/g, '').replace(',', '.');

    let priceRestante = parseFloat(getpriceRestante != '' ? getpriceRestante : 0);
    let priceAdd = parseFloat(getpriceAdd != '' ? getpriceAdd : 0);

    // Somando valores
    let totalValores = parseFloat(priceAdd + priceRestante).toFixed(2);
    let totalValoresCobrar = parseFloat(priceAdd).toFixed(2);

    totalValores = Intl.NumberFormat('pt-BR').format(totalValores);
    totalValoresCobrar = Intl.NumberFormat('pt-BR').format(totalValoresCobrar);

    console.log(totalValores);

    $('#somaTotal').html("R$ " + totalValores);

    $('#somaTotalCobrar').html("R$ " + totalValoresCobrar);
})

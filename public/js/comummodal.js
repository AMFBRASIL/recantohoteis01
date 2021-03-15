$(document).ready(function(){

    $('body').on('hidden.empModal', '.modal', function () {
        $(this).removeData('empModal');
    });

    $(document).on('focusin', function(e) {
        if ($(e.target).closest(".tox").length) {
            e.stopImmediatePropagation();
        }
    });

    $(this).removeData('empModal');

    $("#empModal").modal({
        show: false,
        backdrop: 'static'
    });

    $('.detalhesConsumo').click(function(){

        $(this).removeData();

        $("#empModal").modal({
            show: false,
            backdrop: 'static'
        });

        var ModalUrl    = "modaldetalheconsumo.php";

        $.ajax({
            url: ModalUrl,
            type: 'post',
            data: {},
            success: function(response){

                $('.modal-title').html("Detalhes Consumo CartÃ£o : #858");
                $('.modal-body').html(response);
                $('#empModal').modal('show');

                $(this).removeData();
            }
        });
    });

    $('.cancelarItem').click(function(){

        $(this).removeData();

        $("#empModal").modal({
            show: false,
            backdrop: 'static'
        });

        var ModalUrl    = "modalcancelaritem.php";

        $.ajax({
            url: ModalUrl,
            type: 'post',
            data: {},
            success: function(response){

                $('.modal-title').html("Detalhes do Uso do Cartao #234");
                $('.modal-body').html(response);
                $('#empModal').modal('show');

                $(this).removeData();
            }
        });
    });

    $('.detalhescartaoUso').click(function(){

        $(this).removeData();

        $("#empModal").modal({
            show: false,
            backdrop: 'static'
        });

        var ModalUrl    = "modalcartaouso.php";

        $.ajax({
            url: ModalUrl,
            type: 'post',
            data: {},
            success: function(response){

                $('.modal-title').html("Detalhes do Uso do Cartao #234");
                $('.modal-body').html(response);
                $('#empModal').modal('show');

                $(this).removeData();
            }
        });
    });

    $('.detalhesConsumoItens').click(function(){

        $(this).removeData();

        $("#empModal").modal({
            show: false,
            backdrop: 'static'
        });

        var ModalUrl    = "modalvendasitens.php";

        $.ajax({
            url: ModalUrl,
            type: 'post',
            data: {},
            success: function(response){

                $('.modal-title').html("Detalhes dos Itens da Venda #858");
                $('.modal-body').html(response);
                $('#empModal').modal('show');

                $(this).removeData();
            }
        });
    });

    $('.InformacoesReserva').click(function(){

        $(this).removeData('empModal');

        $("#empModal").modal({
            show: false,
            backdrop: 'static'
        });

        var ModalUrl    = "modalfinanceiro.php";

        $.ajax({
            url: ModalUrl,
            type: 'post',
            data: {},
            success: function(response){
                $('.modal-body').html(response);
                $('#empModal').modal('show');
                $(this).removeData('empModal');
            }
        });
    });

    $('.validar').click(function(){

        $(this).removeData('empModal');

        $("#empModal").modal({
            show: false,
            backdrop: 'static'
        });

        var ModalUrl    = "modalvalidacoes.php";

        $.ajax({
            url: ModalUrl,
            type: 'post',
            data: {},
            success: function(response){
                $('.modal-body').html(response);
                $('#empModal').modal('show');
                $(this).removeData('empModal');
            }
        });
    });

    $('.adiantamento').click(function(){

        $(this).removeData('empModal');

        $("#empModal").modal({
            show: false,
            backdrop: 'static'
        });

        var ModalUrl    = "modaladdpayment.php";

        $.ajax({
            url: ModalUrl,
            type: 'post',
            data: {},
            success: function(response){
                $('.modal-title').html("Adiantamento de Valores do Hospede");
                $('.modal-body').html(response);
                $('#empModal').modal('show');
                $(this).removeData('empModal');
            }
        });
    });


    $('.cancelamento').click(function(){

        $(this).removeData('empModal');

        $("#empModal").modal({
            show: false,
            backdrop: 'static'
        });

        var ModalUrl    = "modalcancelamento.php";

        $.ajax({
            url: ModalUrl,
            type: 'post',
            data: {},
            success: function(response){

                $('.modal-title').html("Cancelamento do Quarto #101");
                $('.modal-body').html(response);
                $('#empModal').modal('show');
                $(this).removeData('empModal');

            }
        });
    });

    $('.editBooking').click(function(){

        $(this).removeData('empModal');

        $("#empModal").modal({
            show: false,
            backdrop: 'static'
        });

        var ModalUrl    = "modalnovareserva.php";

        $.ajax({
            url: ModalUrl,
            type: 'post',
            data: {},
            success: function(response){

                $('.modal-title').html("Editando Reserva Numero #00299");
                $('.modal-body').html(response);
                $('#empModal').modal('show');
                $(this).removeData('empModal');
            }
        });
    });

    $('.editHospede').click(function(){

        $(this).removeData('empModal');

        $("#empModal").modal({
            show: false,
            backdrop: 'static'
        });

        var ModalUrl    = "modalEditHospede.php";

        $.ajax({
            url: ModalUrl,
            type: 'post',
            data: {},
            success: function(response){
                $('.modal-body').html(response);
                $('#empModal').modal('show');
                $(this).removeData('empModal');
            }
        });
    });


    $('.detalhesPagamento').click(function(){

        $(this).removeData('empModal');

        $("#empModal").modal({
            show: false,
            backdrop: 'static'
        });

        var ModalUrl    = "modalhospedagemdebitos.php";

        $.ajax({
            url: ModalUrl,
            type: 'post',
            data: {},
            success: function(response){
                $('.modal-title').html("Valores pendentes Hospedagem");
                $('.modal-body').html(response);
                $('#empModal').modal('show');
                $(this).removeData('empModal');
            }
        });

    });


    $('.detalhesCheckin').click(function(){

        $(this).removeData('empModal');

        $("#empModal").modal({
            show: false,
            backdrop: 'static'
        });

        var IdStatus    = $(this).attr('IdStatus');
        var ModalUrl    = "";
        var tituloModal = "";

        switch(IdStatus) {
            case "1":
                ModalUrl = "modalcheckincheckout.php";
                tituloModal = " Detalhes Checkin CheckOut ";
                break;
            default:
                tituloModal = "Detalhes Checkin CheckOut";
                ModalUrl = "modalcheckincheckout.php";
        }

        $.ajax({
            url: ModalUrl,
            type: 'post',
            data: {},
            success: function(response){
                $('.modal-title').html(tituloModal);
                $('.modal-body').html(response);
                $('#empModal').modal('show');
                $(this).removeData('empModal');
            }
        });
    });


    $('.detalhesReserva').click(function(){

        $(this).removeData('empModal');

        $("#empModal").modal({
            show: false,
            backdrop: 'static'
        });

        var ModalUrl    = "modaldetalhes.php";

        var IdReserva    = $(this).attr('IdReserva');

        $.ajax({
            url: ModalUrl,
            type: 'post',
            data: {Id : IdReserva},
            success: function(response){
                $('.modal-title').html("Detalhes da Reserva Nro: #" + IdReserva);
                $('.modal-body').html(response);
                $('#empModal').modal('show');
                $(this).removeData('empModal');
            }
        });
    });


    $('.detalhesHistorico').click(function(){

        $(this).removeData('empModal');

        $("#empModal").modal({
            show: false,
            backdrop: 'static'
        });

        var ModalUrl    = "modalhistoricotexto.php";

        $.ajax({
            url: ModalUrl,
            type: 'post',
            data: {},
            success: function(response){

                $('.modal-title').html("Detalhes ObservaÃ§Ãµes");
                $('.modal-body').html(response);
                $('#empModal').modal('show');
                $(this).removeData('empModal');
            }
        });
    });


    $('.detalheSituacaoItens').click(function(){

        $(this).removeData('empModal');

        $("#empModal").modal({
            show: false,
            backdrop: 'static'
        });

        var ModalUrl    = "modalsituacaoitens.php";

        $.ajax({
            url: ModalUrl,
            type: 'post',
            data: {},
            success: function(response){
                $('.modal-title').html("Detalhes da SituaÃ§Ã£o dos Itens da Venda");
                $('.modal-body').html(response);
                $('#empModal').modal('show');
                $(this).removeData('empModal');
            }
        });
    });


    $('.detalhesHospede').click(function(){

        $(this).removeData('empModallg');

        $("#empModallg").modal({
            show: false,
            backdrop: 'static'
        });

        var ModalUrl    = "modalhospede.php";

        $.ajax({
            url: ModalUrl,
            type: 'post',
            data: {},
            success: function(response){
                $('.modal-body').html(response);
                $('#empModallg').modal('show');
                $(this).removeData('empModallg');
            }
        });
    });

    $('.detalhesIntegrantes').click(function(){

        $(this).removeData('empModal');

        $("#empModal").modal({
            show: false,
            backdrop: 'static'
        });

        var ModalUrl    = "modalintegrante.php";

        $.ajax({
            url: ModalUrl,
            type: 'post',
            data: {},
            success: function(response){
                $('.modal-body').html(response);
                $('#empModal').modal('show');
                $(this).removeData('empModal');
            }
        });

    });


    $('.newHospede').click(function(){

        $(this).removeData('empModalReserve');

        $("#empModalReserve").modal({
            show: false,
            backdrop: 'static'
        });

        var ModalUrl    = "modalnewhospede.php";

        $.ajax({
            url: ModalUrl,
            type: 'post',
            data: {},
            success: function(response){
                $('.modal-body').html(response);
                $('#empModalReserve').modal('show');
                $(this).removeData('empModalReserve');
            }

        });

    });


    $('#estancia1').on('click', '#fp_cancel', function(e) {
        e.preventDefault();
        $.colorbox.close();
        location.reload(false);
    });

    $(document).on('focusin', function(e) {
        if ($(e.target).closest(".mce-window").length) {
            e.stopImmediatePropagation();
        }
    });

    $(document).on('focusin', function(e) {
        if ($(e.target).closest(".tox").length) {
            e.stopImmediatePropagation();
        }
    });

    $(document).on('focusin', function(e) {
        if ($(e.target).closest(" .tox-dialog").length) {
            e.stopImmediatePropagation();
        }
    });

    $('.trocasituacao').click(function(){

        $(this).removeData('empModal');

        $("#empModal").modal({
            show: false,
            backdrop: 'static'
        });

        var ModalUrl    = "modalmudarsituacao.php";

        $.ajax({
            url: ModalUrl,
            type: 'post',
            data: {},
            success: function(response){

                //tinymce.remove();

                /*tinymce.init({
                    selector    : "textarea",
                    width       : '100%',
                    height      : 270
                });*/

                $('.modal-body').html(response);
                $('#empModal').modal('show');
                $(this).removeData('empModal');
            }
        });
    });

    $('.newservico').click(function(){

        $(this).removeData('empModal');

        $("#empModal").modal({
            show: false,
            backdrop: 'static'
        });

        var ModalUrl    = "modalservico.php";

        $.ajax({
            url: ModalUrl,
            type: 'post',
            data: {},
            success: function(response){

                /*tinymce.remove();

                tinymce.init({
                    selector    : "textarea",
                    width       : '100%',
                    height      : 270
                }); */

                $('.modal-body').html(response);
                $('#empModal').modal('show');
                $(this).removeData('empModal');
            }
        });
    });

    $('.NewReserva').click(function(){

        $(this).removeData('empModal');

        $("#empModal").modal({
            show: false,
            backdrop: 'static'
        });

        var IdStatus    = $(this).attr('IdStatus');
        var ModalUrl    = "";
        var tituloModal = "";

        switch(IdStatus) {
            case "1":
                ModalUrl = "modalnovareserva.php";
                tituloModal = "NOVA RESERVA ";
                break;
            default:
                tituloModal = "NOVA RESERVA";
                ModalUrl = "modalnovareserva.php";
        }

        $.ajax({
            url: ModalUrl,
            type: 'post',
            data: {},
            success: function(response){

                /*tinymce.remove();

                tinymce.init({
                    selector    : "textarea",
                    width       : '100%',
                    height      : 270
                }); */

                $('.modal-title').html(tituloModal);
                $('.modal-body').html(response);
                $('#empModal').modal('show');

                $(this).removeData('empModal');


                $('body').on('hidden.empModal', '.modal', function () {
                    $(this).removeData('empModal');
                });

            }
        });
    });


    $('.NewCliente').click(function(){

        $(this).removeData('empModal');

        $("#empModal").modal({
            show: false,
            backdrop: 'static'
        });

        var IdStatus    = $(this).attr('IdStatus');
        var ModalUrl    = "";
        var tituloModal = "Cadastre-se";

        ModalUrl = "modalnovocliente.php";

        $.ajax({
            url: ModalUrl,
            type: 'post',
            data: {},
            success: function(response){

                $('.modal-title').html(tituloModal);
                $('.modal-body').html(response);
                $('#empModal').modal('show');

                $(this).removeData('empModal');

                $('body').on('hidden.empModal', '.modal', function () {
                    $(this).removeData('empModal');
                });

            }
        });
    });


    $('.mapaQuartosDisponivel').click(function(){
        window.location = "mapadisponivel.php";
    });

});

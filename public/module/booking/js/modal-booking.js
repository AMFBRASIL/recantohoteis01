let hotels
let farms
let events
let dayUser

let start_booking
let end_booking

$(function () {
    $(".previous").click(function () {
        $(".nav-tabs > .nav-item > .active").parent().prev("li").find("a").trigger("click");
    });

    $(".next").click(function (e) {
        $(".nav-tabs > .nav-item > .active").parent().next("li").find("a").trigger("click");
    });

    $('#client-cpf').on('keyup', function () {
        $('#client-cpf').mask('000.000.000-00', {reverse: true});
    });

    $("#client-name").autocomplete({
        source: (request, response) => {
            $.ajax({
                url: "/admin/module/user/autocomplete",
                dataType: "json",
                data: {
                    q: $('#client-name').val()
                },
                success: function (data) {
                    response($.map(data.results, function (item) {
                        return {
                            id: item.id,
                            value: item.text
                        };
                    }));
                }
            });
        },
        minLength: 1,
        select: function (event, ui) {
            searchUserInformationById(ui.item.id)
        }
    });

    $('#bt-client-rg').click(() => {
        searchUserInformationByRg($('#client-rg').val())
    });

    $('#bt-client-cpf').click(() => {
        searchUserInformationByCpf($('#client-cpf').val())
    });

    $("#client-company").autocomplete({
        source: (request, response) => {
            $.ajax({
                url: "/admin/module/user/autocompleteBusinessName",
                dataType: "json",
                data: {
                    q: $('#client-company').val()
                },
                success: function (data) {
                    response($.map(data.results, function (item) {
                        return {
                            id: item.id,
                            value: item.text
                        };
                    }));
                }
            });
        },
        minLength: 1,
        select: function (event, ui) {
            searchUserInformationById(ui.item.id)
        }
    });

    $('.edit-client').on('click', () => {
        window.open(`/admin/module/user/edit/${$("#client-id").val()}`);
    });

    $('input[type=radio][name=property_type]').on('change', function () {
        switch ($(this).val()) {
            case "1":
                $("#divChacara").hide();
                $("#divHotel").show();
                $("#reportData").html("");
                break;
            case "2":
                $("#divChacara").show();
                $("#divHotel").hide();
                $("#reportData").html("");
                break;
            case "3":
                $("#divChacara").show();
                $("#divHotel").hide();
                $("#reportData").html("");
                break;
            case "4":
                $("#divChacara").show();
                $("#divHotel").hide();
                $("#reportData").html("");
                break;
            default:
                $("#divHotel").hide();
                $("#reportData").html("");
        }
    });

    getSalesChannels();

    this.start_booking = moment().startOf("hour");
    this.end_booking = moment().startOf("hour").add(32, "hour");

    cb(this.start_booking, this.end_booking);

    $("#reportrange")
        .daterangepicker(
            {
                timePicker: true,
                startDate: this.start_booking,
                endDate: this.end_booking,
                alwaysShowCalendars: true,
                opens: "left",
                showDropdowns: true,
                format: "M/DD hh:mm A",
                ranges: {
                    Hoje: [moment(), moment()],
                },
            }, function (start, end) {
                start_booking = start;
                end_booking = end;
                cb(start_booking, end_booking);
                chamarCall();
            }
        );

    $('input[type=radio][name=pagamentoReserva]').on('change', function () {
        switch ($(this).val()) {
            case "1":
                $("#formaDinheiro").show();
                $("#formaDeposito").hide();
                $("#formaCartao").hide();
                $("#formaCartaoNSU").hide();

                //Zerando os dados
                $('#priceRecebido').val("");
                $('#somaRecebido').html("");
                $('#priceDeposito').val("");
                $('#somaDeposito').html("");
                $('#priceCartao').val("");
                $('#somaCartao').html("");


                break;
            case "2":
                $("#formaDinheiro").hide();
                $("#formaDeposito").hide();
                $("#formaCartao").hide();
                $("#formaCartaoNSU").hide();

                //Zerando os dados
                $('#priceRecebido').val("");
                $('#somaRecebido').html("");
                $('#priceDeposito').val("");
                $('#somaDeposito').html("");
                $('#priceCartao').val("");
                $('#somaCartao').html("");

                break;
            case "3":
                $("#formaDinheiro").hide();
                $("#formaDeposito").show();
                $("#formaCartao").hide();
                $("#formaCartaoNSU").hide();

                //Zerando os dados
                $('#priceRecebido').val("");
                $('#somaRecebido').html("");
                $('#priceDeposito').val("");
                $('#somaDeposito').html("");
                $('#priceCartao').val("");
                $('#somaCartao').html("");

                break;
            case "4":
                $("#formaCartao").show();
                $("#formaDinheiro").hide();
                $("#formaDeposito").hide();
                $("#formaCartaoNSU").show();

                //Zerando os dados
                $('#priceRecebido').val("");
                $('#somaRecebido').html("");
                $('#priceDeposito').val("");
                $('#somaDeposito').html("");
                $('#priceCartao').val("");
                $('#somaCartao').html("");

                break;
            default:
                $("#formaCartao").hide();
                $("#formaDinheiro").hide();
                $("#formaDeposito").hide();
                $("#formaCartaoNSU").hide();

                //Zerando os dados
                $('#priceRecebido').val("");
                $('#somaRecebido').html("");
                $('#priceDeposito').val("");
                $('#somaDeposito').html("");
                $('#priceCartao').val("");
                $('#somaCartao').html("");
        }
    });

    $('#priceRecebido').on('keyup', function () {
        $("#somaDinheiroRecebido").show();
        let priceRecebido = $('#priceRecebido').val().replace(/[.]/g, '').replace(',', '.');

        priceRecebido = parseFloat(priceRecebido != '' ? priceRecebido : 0);
        priceRecebido = formatNumber(priceRecebido);

        $('#somaRecebido').html("R$ " + priceRecebido);
    })

    $('#priceDeposito').on('keyup', function () {

        $("#divDeposito").show();

        let getpriceAdd = $('#priceDeposito').val().replace(/[.]/g, '').replace(',', '.');

        let priceAdd = parseFloat(getpriceAdd != '' ? getpriceAdd : 0);

        // Somando valores
        let totalValores = parseFloat(priceAdd).toFixed(2);
        totalValores = Intl.NumberFormat('pt-BR').format(totalValores);

        $('#somaDeposito').html("R$ " + totalValores);

    })

    $('#priceCartao').on('keyup', function () {

        $("#divCartao").show();

        let getpriceAdd = $('#priceCartao').val().replace(/[.]/g, '').replace(',', '.');

        let priceAdd = parseFloat(getpriceAdd != '' ? getpriceAdd : 0);

        // Somando valores
        let totalValores = parseFloat(priceAdd).toFixed(2);
        totalValores = Intl.NumberFormat('pt-BR').format(totalValores);

        $('#somaCartao').html("R$ " + totalValores);

    })


    $('#aceitaDesconto').change(function () {
        if ($(this).prop('checked')) {
            if ($("#aceitaDesconto").prop('checked')) {
                $('#TipoDesconto').show();
                $('#valorDesconto').show();
            }
        } else {
            $('#TipoDesconto').hide();
            $('#valorDesconto').hide();
        }
    });


    $('#liberarCartaoConsumo').change(function () {
        if ($(this).prop('checked')) {
            if ($("#liberarCartaoConsumo").prop('checked')) {
                alert("Pedir senha para autorizar cartao... ");
                $('#NumeroCartaoDiv').show();
                $('#ValorCartaoDiv').show();
            }
        } else {
            $('#NumeroCartaoDiv').hide();
            $('#ValorCartaoDiv').hide();
        }
    });

    $('#liberarAcesso').change(function () {
        if ($(this).prop('checked')) {
            if ($("#liberarAcesso").prop('checked')) {
                $('#numeroChaveAcesso').show();
            }
        } else {
            $('#numeroChaveAcesso').hide();
        }
    });


    $('#AddCartaoConsumoValor').on('keyup', function () {

        $("#somatoriaValor").show();

        let getpriceAdd = $('#AddCartaoConsumoValor').val().replace(/[.]/g, '').replace(',', '.');

        let priceAdd = parseFloat(getpriceAdd != '' ? getpriceAdd : 0);

        // Somando valores
        let totalValores = parseFloat(priceAdd).toFixed(2);
        totalValores = Intl.NumberFormat('pt-BR').format(totalValores);

        $('#somaTotal').html("R$ " + totalValores);

    })

//$('.moeda-real').mask('#.##0,00', {reverse: true});
});

function searchUserInformationByCpf(user_cpf) {
    let data = {
        cpf: user_cpf,
    };
    searchUserInformation(data);
}

function searchUserInformationByRg(user_rg) {
    let data = {
        rg: user_rg,
    };
    searchUserInformation(data);
}

function searchUserInformationById(user_id) {
    let data = {
        id: user_id,
    };
    searchUserInformation(data);
}

function searchUserInformation(data) {
    let url = "/admin/module/user/getUser/";

    $.ajax({
        url: url,
        type: 'GET',
        data: data,
        success: function (data) {
            setUserInformation(data)
        }
    });
}

function setUserInformation(data) {
    console.log(data.user)
    $('#client-id').val(data.user.id);
    $('#client-name').val(data.user.name);
    $('#client-rg').val(data.user.rg);
    $('#client-cpf').val(data.user.cpf_cnpj).mask('000.000.000-00', {reverse: true});
    ;
    $('#client-cellphone').val(data.user.phone).mask('(00) Z0000-0000', {
        translation: {
            'Z': {
                pattern: /[0-9]/,
                optional: true
            }
        }
    });
    ;
    $('#client-email').val(data.user.email);
    // $('#billing-company').val();
    $('#client-company').val(data.user.business_name);
}

function getSalesChannels() {
    let url = "/admin/module/reservation/reservation-type/all";

    $.ajax({
        url: url,
        type: 'GET',
        success: function (data) {
            let select = $('#reservationType');
            select.empty();
            $.each(data, function (index, item) {
                select.append(
                    new Option(item.name, item.id, null, false));
            });
        }
    });
}

function cb(start, end) {
    $("#reportrange span").html(start.format("DD/MM/YYYY hh:mm A") + " - " + end.format("DD/MM/YYYY hh:mm A"));
}

function chamarCall() {

    let property_type = $('input[name=property_type]:checked').val();

    $("#reportData").html("LOADING PROCESS... ");

    if (property_type == 1) {

        if ($("#qtdeAdult").val() == "" || $("#qtdeAdult").val() <= 0) {
            alert("Favor informa a qauntidade de pessoas");
            $("#reportData").html("<button type='button' onClick='javascript:chamarCall()' type='button' class='btn btn-lg btn-primary'>Pesquisar Disponibilidade</button>");
            $("#qtdeAdult").focus();
            return false;
        }

        if ($("#qtdeChildren").val() == "" || $("#qtdeChildren").val() <= 0) {
            alert("Favor informar a quantidade de crianças de 0 a 5 anos");
            $("#reportData").html("<button type='button' onClick='javascript:chamarCall()' class='btn btn-lg btn-primary'>Pesquisar Disponibilidade</button>");
            $("#qtdeChildren").focus();
            return false;
        }

        if ($("#qtdeKids").val() == "" || $("#qtdeKids").val() <= 0) {
            alert("Favor informar a quantidade de crianças de 6 a 12 anos");
            $("#reportData").html("<button type='button'  onClick='javascript:chamarCall()' class='btn btn-lg btn-primary'>Pesquisar Disponibilidade</button>");
            $("#qtdeKids").focus();
            return false;
        }

    }

    // Se tiver Checado o CHACARA validar campos do hotel para quantidade de pessoas.
    if (property_type != 1) {
        if ($("#qtdeAdult").val() == "" || $("#qtdeAdult").val() <= 0) {
            alert("Favor informa a qauntidade de pessoas");
            $("#reportData").html("<button type='button' onClick='javascript:chamarCall()' type='button' class='btn btn-lg btn-primary'>Pesquisar Disponibilidade</button>");
            $("#qtdeAdult").focus();
            return false;
        }
    }

    switch (property_type) {
        case "1":
            foundHotel();
            break;
        case "2":
            foundFarms()
            break;
        case "3":
            foundEvents()
            break;
        case "4":
            foundDayUsers()
            break;
    }
}

function foundHotel() {
    let data = {
        start: start_booking.format("Y-M-D"),
        end: end_booking.format("Y-M-D"),
    };

    $.ajax({
        url: "/admin/module/booking/freeRoomInRange/",
        data: data,
        dataType: "json",
        type: "get",
        success: function (res) {
            console.log(res)
            hotels = res.rooms,
                $("#reportData").html(`EXISTEM ${res.rooms.length} QUARTOS DISPONIVEIS PARA ESTA DATA`);
            $('#booking-uhs-disponiveis').html(res.view);
            $('[data-toggle="popover"]').popover(
                {
                    selector: '[data-toggle=popover]',
                    trigger: 'hover',
                    html: true,
                    container: 'body',
                    placement: 'auto'
                }
            );
        },
    });
}

function foundFarms() {
    let data = {
        start: start_booking.format("Y-M-D"),
        end: end_booking.format("Y-M-D"),
    };

    $.ajax({
        url: "/admin/module/booking/freeSpaceInRange/",
        data: data,
        dataType: "json",
        type: "get",
        success: function (res) {
            console.log(res)
            farms = res.spaces,
                $("#reportData").html(`EXISTEM ${res.spaces.length} CHACARAS DISPONIVEIS PARA ESTA DATA`);
            $('#booking-uhs-disponiveis').html(res.view);
            $('[data-toggle="popover"]').popover(
                {
                    selector: '[data-toggle=popover]',
                    trigger: 'hover',
                    html: true,
                    container: 'body',
                    placement: 'auto'
                }
            );
        },
    });
}

function foundEvents() {
    let data = {
        start: start_booking.format("Y-M-D"),
        end: end_booking.format("Y-M-D"),
    };

    $.ajax({
        url: "/admin/module/booking/freeEventInRange/",
        data: data,
        dataType: "json",
        type: "get",
        success: function (res) {
            console.log(res)
            events = res.events
            $("#reportData").html(`EXISTEM ${res.events.length} EVENTOS DISPONIVEIS PARA ESTA DATA`);
            $('#booking-uhs-disponiveis').html('');
        },
    });
}

function foundDayUsers() {
    let data = {
        start: start_booking.format("Y-M-D"),
        end: end_booking.format("Y-M-D"),
    };

    $.ajax({
        url: "/admin/module/booking/freeDayUserInRange/",
        data: data,
        dataType: "json",
        type: "get",
        success: function (res) {
            console.log(res)
            dayUser = res.tours,
            $("#reportData").html(`EXISTEM ${res.tours.length} VAGAS DISPONIVEIS PARA ESTA DATA DO DAY USE`);
            $('#booking-uhs-disponiveis').html(res.view);
            $('[data-toggle="popover"]').popover(
                {
                    selector: '[data-toggle=popover]',
                    trigger: 'hover',
                    html: true,
                    container: 'body',
                    placement: 'auto'
                }
            );
        },
    });
}

function formatNumber(value) {
    if (value != null) {
        return value.toFixed(2).replace('.', ',')
            .replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
    }
}


/* Mokup*/

/*

function liberarbotao() {
    alert("Liberar botao quando tudo estiver preenchido e OK ... somente assim pode salvar a reserva.");
}

// Alterar o codigo para selecionar todos da Linha quando clicar em All ... e vice versa !
$('input:checkbox').change(function () {

    if ($(this).prop('checked')) {

        //$('#checkCafe_1').prop('checked', true).change();
        //$('#checkCafe_1').prop('checked', false).change();
        //$('#checkCafe_1').change();

        if ($("#checkAll_1").prop('checked')) {
            alert("Quando selecionar CheckAll , Ativar os 3 ( Cafe , almoco e janta ). \n\nSe for selecionado algum separadamente , devemos entao desativar os outros...\n\nDevemos buscar na base os valores de taxa de cada servico e trazer na tela calculado de acordo com a quantidade de hospedes selecionado. ");
            $('#valordiaria01').html("<b>R$ 80,00</b>");
            $('#calculado01').html("<b>R$ 240,00</b>");
        }

        if ($("#checkAll_2").prop('checked')) {
            alert("Quando selecionar CheckAll , Ativar os 3 ( Cafe , almoco e janta ). \n\nSe for selecionado algum separadamente , devemos entao desativar os outros...\n\nDevemos buscar na base os valores de taxa de cada servico e trazer na tela calculado de acordo com a quantidade de hospedes selecionado.");
            $('#valordiaria02').html("<b>R$ 80,00</b>");
            $('#calculado02').html("<b>R$ 240,00</b>");
        }

    }
});



$(function () {
    $('input[name="datetimeDeposito"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        format: "DD/MM/YYYY hh:mm"
    });
});

$('input[name="datetimeDeposito"]').on('apply.daterangepicker', function (ev, picker) {
    $(this).val(picker.startDate.format('DD/MM/YYYY hh:mm'));
});


$(function () {
    $('input[name="datetimeCartao"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        format: "DD/MM/YYYY hh:mm"
    });
});

$('input[name="datetimeCartao"]').on('apply.daterangepicker', function (ev, picker) {
    $(this).val(picker.startDate.format('DD/MM/YYYY hh:mm'));
});

$(function () {
    $('input[name="datetimes"]').daterangepicker({
        timePicker: true,
        startDate: moment().startOf("hour"),
        endDate: moment().startOf("hour").add(32, "hour"),
        locale: {
            format: "M/DD/YYYY hh:mm A",
        },
    });
});

*/

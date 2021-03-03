$(function() {
    var msg_error = '';
    var msg_success = '';
    var msg_notice = '';

    var button_close = '<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>';
    if (msg_error != '') $('.alert-container .alert-danger').html(msg_error + button_close).show();
    if (msg_success != '') $('.alert-container .alert-success').html(msg_success + button_close).show();
    if (msg_notice != '') $('.alert-container .alert-warning').html(msg_notice + button_close).show();

    //$('[data-toggle="tooltip"]').tooltip();

    //$('.tips').tooltip({
    //    placement: 'top'
    //});

    // $('.tips').tooltip({
    //     align: 'top'
    // });

    tippy('.tips', {
        allowHTML: true,
    });

    $('select[data-filter]').each(function() {
        var target = $(this);
        var currval = $(this).val();
        var curropt = $('option[value="' + currval + '"]', target);
        var input = $('select').filter('[name^="booking_' + target.attr('data-filter') + '"],[name="' + target.attr('data-filter') + '"]');
        input.on('change', function() {
            var val = $(this).val();
            $('option[value!=""]', target).hide().prop('selected', false);
            $('option[rel="' + val + '"]', target).show();
            if (curropt.attr('rel') == val) curropt.prop('selected', true);
        });
        input.trigger('change');
    });

    $(window).on('resize', function() {
        var h = $(this).height() - 50;
        $('.side-nav').css('max-height', h);
    });
    $(window).trigger('resize');
})

$(function() {
    var curr_start_id = '';
    var prev_class = '';
    var curr_room = 0;
    var curr_line = -1;
    var curr_date = null;
    var end_clicked = false;
    var start_clicked = false;
    var curr_elms = [];

    $('body').click(function(e) {
        if (!$(e.target).closest('.timeline-cel').length && !$(e.target).closest('#context-menu > a').length) {
            if (curr_elms.length > 0) {
                $.each(curr_elms, function() {
                    $(this)[0].parent().attr('class', '').addClass($(this)[1]);
                    $(this)[0].remove();
                });
            }
            curr_elms = [];
        }
    });
    $('body').not('#context-menu').click(function() {
        $('#context-menu').hide();
    });

    $('.timeline-default:not(.start-d):not(.start-end-d):not(.full)').on('click', function(e) {
        if (!$(e.target).closest('a').length) {
            var arr_id = $(this).attr('id').split('-');
            var hotel = parseInt(arr_id[1]);
            var room = parseInt(arr_id[2]);
            var line = parseInt(arr_id[3]);
            var date = parseInt(arr_id[4]);
            // set start date
            if ((curr_room == 0 || (curr_room > 0 && curr_room != room)) ||
                (curr_line == -1 || (curr_line > -1 && curr_line != line)) ||
                (curr_date == null || (curr_date > 0 && curr_date > date)) ||
                end_clicked) {

                if (curr_elms.length > 0) {
                    $.each(curr_elms, function() {
                        $(this)[0].parent().attr('class', '').addClass($(this)[1]);
                        $(this)[0].remove();
                    });
                }
                curr_elms = [];

                if (!end_clicked && prev_class != '' && curr_start_id != '') $('#' + curr_start_id).attr('class', '').addClass(prev_class);

                prev_class = $(this).attr('class');

                var class_attr = ($(this).hasClass('end-d')) ? 'start-end-d' : 'start-d';
                var elm = $('<a class="pending"></a>');
                $(this).removeClass('end-d').addClass(class_attr + ' booked pending').append(elm);
                curr_elms.push([elm, prev_class]);

                curr_start_id = $(this).attr('id');
                curr_room = room;
                curr_line = line;
                curr_date = date;
                end_clicked = false;
                start_clicked = true;
            }
        }
    });
    $('.timeline-default:not(.end-d):not(.start-end-d):not(.full)').on('click', function(e) {
        if (!$(e.target).closest('a').length) {
            var arr_id = $(this).attr('id').split('-');
            var hotel = parseInt(arr_id[1]);
            var room = parseInt(arr_id[2]);
            var line = parseInt(arr_id[3]);
            var date = parseInt(arr_id[4]);
            // set end date
            if (curr_room > 0 && curr_room == room &&
                curr_line > -1 && curr_line == line &&
                curr_date > 0 && curr_date < date &&
                start_clicked) {

                var booked = false;
                var limit = 0;
                var end_id = $(this).attr('id');
                var next_elm = $('#' + curr_start_id).next();
                var next_id = next_elm.attr('id');
                while (next_id != end_id && limit < 31) {
                    if ($('#' + next_id).hasClass('booked')) {
                        booked = true;
                        break;
                    }
                    next_elm = next_elm.next();
                    next_id = next_elm.attr('id');
                    limit++;
                }

                if (!booked) {
                    end_id = $(this).attr('id');
                    end_clicked = true;
                    start_clicked = false;
                    var class_attr = ($(this).hasClass('start-d')) ? 'start-end-d' : 'end-d';

                    var curr_class = $(this).attr('class');

                    var elm = $('<a class="pending"></a>');
                    $(this).removeClass('start-d').addClass(class_attr).prepend(elm);
                    curr_elms.push([elm, curr_class]);

                    limit = 0;
                    next_elm = $('#' + curr_start_id).next();
                    next_id = next_elm.attr('id');
                    while (next_id != end_id && limit < 31) {
                        var curr_class = next_elm.attr('class');
                        var elm = $('<a class="pending"></a>');
                        next_elm.addClass('booked full pending').append(elm);
                        curr_elms.push([elm, curr_class]);
                        next_elm = next_elm.next();
                        next_id = next_elm.attr('id');
                        limit++;
                    }
                    /*var from_time = new Date(curr_date*1000);
                    var from_date = from_time.getUTCFullYear()+'-'+(from_time.getUTCMonth()+1)+'-'+from_time.getUTCDate();
                    var to_time = new Date(date*1000);
                    var to_date = to_time.getUTCFullYear()+'-'+(to_time.getUTCMonth()+1)+'-'+to_time.getUTCDate();*/

                    var nnights = (date - curr_date) / 86400;
                    var room_title = $('#room-title-' + room).html().trim();
                    //var room_num = $('#room-num-'+room+'-'+line).html().trim().replace('#', '%23');

                    //$('#context-menu').html('<a href="index.php?view=form&id=0&booking_id_hotel_0='+hotel+'&booking_from_date_0='+curr_date+'&booking_to_date_0='+date+'&booking_nights_0='+nnights+'&booking_status_0=1&booking_room_id_hotel_0='+hotel+'&booking_room_id_room_0='+room+'&booking_room_title_0='+room_title+'">New booking</a>'+
                    //'<a href="../room/index.php?view=form&id='+room+'&room_closing_from_date_0='+curr_date+'&room_closing_to_date_0='+date+'">New closing date</a>');

                    var botaoAcoes = '<a href="#" data-toggle="modal" data-target="#new_reservation" >New booking</a>' +
                        '<a href=""  data-toggle="modal" data-target="#modal_edit_reserva">Edit closing date</a>';

                    $('#context-menu').html(botaoAcoes);

                    setTimeout(function() {
                        $('#context-menu').css({
                            'left': e.pageX - 240 + 'px',
                            'top': e.pageY - 55 + 'px'
                        }).slideDown();
                    }, 100);
                    //console.log(e);
                }
            }
        }
    });

    var saved_price = 0;
    $('.price-input').on('focus', function(e) {
        var price = $(this).val().replace(/[^\d.-]/g, '');
        $(this).val(price);
        saved_price = price;
    });
    $('.stock-input').on('focus', function(e) {
        var stock = $(this).val().replace(/[^\d.-]/g, '');
        $(this).val(stock);
        saved_stock = stock;
    });
    $('.ajax-input').on('blur', function(e) {
        e.defaultPrevented;

        var input = $(this);
        var val = input.val();
        var form = input.parents('form.ajax-form');
        var action = input.data('action');

        $.ajax({
            url: action,
            type: form.attr('method'),
            data: form.serialize(),
            success: function(response) {
                var response = $.parseJSON(response);

                if (response.error != '') {
                    if (input.hasClass('price-input')) val = '$ ' + saved_price;
                    else val = saved_stock;
                    input.removeClass('text-success').addClass('text-danger');
                    setTimeout(function() {
                        input.removeClass('text-danger').val(val);
                    }, 1000);
                }
                if (response.success != '') {
                    if (response.html != '') $('[name="rate_id"]', form).val(response.html);
                    if (input.hasClass('price-input')) val = '$ ' + val;
                    else {
                        var remain = val - $('[name="num_bookings"]', form).val();
                        if (remain < 0) remain = 0;
                        $('.remain', form).html(remain);
                        if (remain == 0) form.parents('.timeline-info').addClass('full');
                        else form.parents('.timeline-info').removeClass('full');
                    }
                    input.removeClass('noprice text-danger').addClass('text-success').val(val);
                }
            }
        });
    });
});

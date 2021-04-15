$(function () {
    $('.moeda-real').mask('#.##0,00', {reverse: true});

    $('[data-toggle="tooltip"]').tooltip()

    /*MONDAY*/
    let is_monday = $('#is_monday')

    is_monday.change(function () {
        if (is_monday.prop('checked')) {
            is_monday.val('S');
            $('#is_monday_input').val('S');
        } else {
            is_monday.val('N');
            $('#is_monday_input').val('N');
        }
    });

    if(is_monday.val() == 'S'){
        is_monday.prop( "checked", true );
        is_monday.bootstrapToggle('on')
        $('#is_monday_input').val('S');
    }else{
        is_monday.prop( "checked", false );
        is_monday.bootstrapToggle('off')
        $('#is_monday_input').val('N');
    }

    /*TUESDAY*/
    let is_tuesday = $('#is_tuesday')

    is_tuesday.change(function () {
        if (is_tuesday.prop('checked')) {
            is_tuesday.val('S');
            $('#is_tuesday_input').val('S');
        } else {
            is_tuesday.val('N');
            $('#is_tuesday_input').val('N');
        }
    });

    if(is_tuesday.val() == 'S'){
        is_tuesday.prop( "checked", true );
        is_tuesday.bootstrapToggle('on')
        $('#is_tuesday_input').val('S');
    }else{
        is_tuesday.prop( "checked", false );
        is_tuesday.bootstrapToggle('off')
        $('#is_tuesday_input').val('N');
    }

    /*WEDNESDAY*/
    let is_wednesday = $('#is_wednesday')

    is_wednesday.change(function () {
        if (is_wednesday.prop('checked')) {
            is_wednesday.val('S');
            $('#is_wednesday_input').val('S');
        } else {
            is_wednesday.val('N');
            $('#is_wednesday_input').val('S');
        }
    });

    if(is_wednesday.val() == 'S'){
        is_wednesday.prop( "checked", true );
        is_wednesday.bootstrapToggle('on')
        $('#is_wednesday_input').val('S');
    }else{
        is_wednesday.prop( "checked", false );
        is_wednesday.bootstrapToggle('off')
        $('#is_wednesday_input').val('N');
    }

    /*THURSDAY*/
    let is_thursday = $('#is_thursday')

    is_thursday.change(function () {
        if (is_thursday.prop('checked')) {
            is_thursday.val('S');
            $('#is_thursday_input').val('S');
        } else {
            is_thursday.val('N');
            $('#is_thursday_input').val('N');
        }
    });

    if(is_thursday.val() == 'S'){
        is_thursday.prop( "checked", true );
        is_thursday.bootstrapToggle('on')
        $('#is_thursday_input').val('S');
    }else{
        is_thursday.prop( "checked", false );
        is_thursday.bootstrapToggle('off')
        $('#is_thursday_input').val('N');
    }

    /*FRINDAY*/
    let is_friday = $('#is_friday')

    is_friday.change(function () {
        if (is_friday.prop('checked')) {
            is_friday.val('S');
            $('#is_friday_input').val('S');
        } else {
            is_friday.val('N');
            $('#is_friday_input').val('N');
        }
    });

    if(is_friday.val() == 'S'){
        is_friday.prop( "checked", true );
        is_friday.bootstrapToggle('on')
        $('#is_friday_input').val('S');
    }else{
        is_friday.prop( "checked", false );
        is_friday.bootstrapToggle('off')
        $('#is_friday_input').val('N');
    }

    /*SATURDAY*/
    let is_saturday = $('#is_saturday')

    is_saturday.change(function () {
        if (is_saturday.prop('checked')) {
            is_saturday.val('S');
            $('#is_saturday_input').val('S');
        } else {
            is_saturday.val('N');
            $('#is_saturday_input').val('N');
        }
    });

    if(is_saturday.val() == 'S'){
        is_saturday.prop( "checked", true );
        is_saturday.bootstrapToggle('on')
        $('#is_saturday_input').val('S');
    }else{
        is_saturday.prop( "checked", false );
        is_saturday.bootstrapToggle('off')
        $('#is_saturday_input').val('N');
    }

    /*SUNDAY*/
    let is_sunday = $('#is_sunday')

    is_sunday.change(function () {
        if (is_sunday.prop('checked')) {
            is_sunday.val('S');
            $('#is_sunday_input').val('S');
        } else {
            is_sunday.val('N');
            $('#is_sunday_input').val('N');
        }
    });

    if(is_sunday.val() == 'S'){
        is_sunday.prop( "checked", true );
        is_sunday.bootstrapToggle('on')
        $('#is_sunday_input').val('S');
    }else{
        is_sunday.prop( "checked", false );
        is_sunday.bootstrapToggle('off')
        $('#is_sunday_input').val('N');
    }
})

<form class="form bravo-form-register" method="get" action="{{route('user.admin.register')}}">
    @csrf
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="form-group">
                <input type="text" class="form-control" required name="first_name" autocomplete="off" placeholder="{{__("Primeiro Nome")}}">
                <i class="input-icon field-icon icofont-waiter-alt"></i>
                <span class="invalid-feedback error error-first_name"></span>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="form-group">
                <input type="text" class="form-control" required name="last_name" autocomplete="off" placeholder="{{__("Sobrenome")}}">
                <i class="input-icon field-icon icofont-waiter-alt"></i>
                <span class="invalid-feedback error error-last_name"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" required name="phone" autocomplete="off" placeholder="{{__('Telefone')}}">
        <i class="input-icon field-icon icofont-ui-touch-phone"></i>
        <span class="invalid-feedback error error-phone"></span>
    </div>
    <div class="form-group">
        <input type="email" class="form-control" required name="email" autocomplete="off" placeholder="{{__('Email')}}">
        <i class="input-icon field-icon icofont-mail"></i>
        <span class="invalid-feedback error error-email"></span>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" required name="password" autocomplete="off" placeholder="{{__('Password')}}">
        <i class="input-icon field-icon icofont-ui-password"></i>
        <span class="invalid-feedback error error-password"></span>
    </div>
    <div class="form-group">
        <label for="term">
            <input id="term" type="checkbox" required name="term" class="mr5">
            {!! __("Eu li e aceito o <a href=':link' target='_blank'>Termos e Política de Privacidade</a>",['link'=>get_page_url(setting_item('booking_term_conditions'))]) !!}
            <span class="checkmark fcheckbox"></span>
        </label>
        <div><span class="invalid-feedback error error-term"></span></div>
    </div>
    <div class="error message-error invalid-feedback"></div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary" style="width: 100%">
            {{ __('Cadastre-se') }}
        </button>
    </div>
</form>


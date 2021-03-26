<div class="modal fade login" id="register" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content relative">
            <div class="modal-header">
                <h4 class="modal-title">{{__('Cadastre-se')}}</h4>
            </div>
            <div class="modal-body">
                <form class="form bravo-form-register" method="get" action="{{route('user.admin.register')}}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label class="control-label">Primeiro Nome:</label>
                                <input type="text" class="form-control" required name="first_name" autocomplete="off" placeholder="{{__("Primeiro Nome")}}">
                                <i class="input-icon field-icon icofont-waiter-alt"></i>
                                <span class="invalid-feedback error error-first_name"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label class="control-label">Sobrenome:</label>
                                <input type="text" class="form-control" required name="last_name" autocomplete="off" placeholder="{{__("Sobrenome")}}">
                                <i class="input-icon field-icon icofont-waiter-alt"></i>
                                <span class="invalid-feedback error error-last_name"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label class="control-label">Telefone:</label>
                                <input type="text" class="form-control" required name="phone" autocomplete="off" placeholder="{{__('Telefone')}}">
                                <i class="input-icon field-icon icofont-ui-touch-phone"></i>
                                <span class="invalid-feedback error error-phone"></span>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-12">
                            <div class="form-group">
                                <label class="control-label">Data Nascimento:</label>
                                <input type="date" class="form-control birthday" name="birthday" autocomplete="off" placeholder="99/99/9999">
                                <i class="input-icon field-icon icofont-waiter-alt"></i>
                                <span class="invalid-feedback error error-last_name"></span>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-12">
                            <div class="form-group">
                                <label class="control-label">Idade:</label>
                                <input type="text" readonly class="form-control age" name="" autocomplete="off" placeholder="">
                                <i class="input-icon field-icon icofont-waiter-alt"></i>
                                <span class="invalid-feedback error error-last_name"></span>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-12">
                            <div class="form-group">
                                <label class="control-label">Adulto/Kid:</label>
                                <select data-placeholder=" " name="aptohospede" id="aptohospede" class="form-control">
                                    <option value="1">ADULTO</option>
                                    <option value="2">KID</option>
                                </select>
                                <i class="input-icon field-icon icofont-waiter-alt"></i>
                                <span class="invalid-feedback error error-last_name"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email:</label>
                        <input type="email" class="form-control" required name="email" autocomplete="off" placeholder="{{__('Email')}}">
                        <i class="input-icon field-icon icofont-mail"></i>
                        <span class="invalid-feedback error error-email"></span>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Senha:</label>
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
                        <button type="submit" class="btn btn-primary form-submit">
                            {{ __('Cadastre-se') }}
                            <span class="spinner-grow spinner-grow-sm icon-loading" role="status" aria-hidden="true"></span>
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-lg btn-secondary mr-center" data-dismiss="modal"><i class="fa fa-close"></i> FECHAR </button>
            </div>
            <script src="{{asset('/libs/jquery-3.3.1.min.js')}}"></script>]
            <script src="{{asset('libs/daterange/moment.min.js')}}"></script>
            <script>
                $(function() {
                    $('.birthday').on('change',function(){
                        console.log('mudou')

                        let years = getAgeFromBirthday($('.birthday').val())
                        console.log(years)
                        $('.age').val(years);

                        if(years <= 5){
                            $("#aptohospede").val("2");
                        }else{
                            $("#aptohospede").val("1");
                        }
                    })
                });

                function getAgeFromBirthday(birthday) {
                    if(birthday){
                        let totalMonths = moment().diff(birthday, 'months');
                        let years = parseInt(totalMonths / 12);
                        /*let months = totalMonths % 12;
                        if(months !== 0){
                            return parseFloat(years + '.' + months);
                        }*/
                        return years;
                    }
                    return null;
                }
            </script>
        </div>
    </div>
</div>





@if(is_default_lang())
    @php $languages = \Modules\Language\Models\Language::getActive(); @endphp
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <h3 class="form-group-title">{{__("Contratos")}}</h3>

            <p>[name_client] - Nome do cliente.</p>
            <p>[address_client] - Endereço.</p>
            <p>[complement_address_client] - Complemento do endereço.</p>
            <p>[zipcode_address_client] - CEP.</p>
            <p>[phone_client] - Telefone 1.</p>
            <p>[phone_zap_client] - Telefone 2 (Whatsapp).</p>
            <p>[cpf_client] - CPF.</p>
            <p>[rg_client] - RG.</p>
            <p>[id_booking] - Id da reserva.</p>
            <p>[date_start_booking] - Data inicial da reserva.</p>
            <p>[date_end_booking] - Data final da reserva.</p>
            <p>[value_booking] - Valor da reserva.</p>
            <p>[value_day] - Valor da diária contratada.</p>
            <p>[date_current] - Data atual.</p>
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <div class="panel-title"><strong>{{__("Opções de contrato")}}</strong></div>
                <div class="panel-body">
                    <div class="form-group">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab"
                                   href="#space_contract">{{__("Contrato")}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab"
                                   href="#space_inspection_term">{{__("Termo de Vistoria")}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab"
                                   href="#space_internal_regime">{{__("Regimento Interno")}}</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="space_contract">
                                <div class="form-group">
                                    <label class="control-label">{{__("Titulo")}}</label>
                                    <input type="text" name="space_contract_title" class="form-control"
                                           placeholder="{{__("Enter title...")}}"
                                           value="{{ setting_item_with_lang('space_contract_title',request()->query('lang'))}}">
                                </div>
                                <div class="form-controls">
                                    <textarea name="space_contract" class="d-none has-ckeditor" cols="30"
                                              rows="10">{{setting_item_with_lang('space_contract',request()->query('lang')) }}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane" id="space_inspection_term">
                                <div class="form-group">
                                    <label class="control-label">{{__("Titulo")}}</label>
                                    <input type="text" name="space_inspection_term_title" class="form-control"
                                           placeholder="{{__("Enter title...")}}"
                                           value="{{setting_item_with_lang('space_inspection_term_title',request()->query('lang')) }}">
                                </div>
                                <div class="form-controls">
                                    <textarea name="space_inspection_term" class="d-none has-ckeditor" cols="30"
                                              rows="10">{{setting_item_with_lang('space_inspection_term',request()->query('lang')) }}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane" id="space_internal_regime">
                                <div class="form-group">
                                    <label class="control-label">{{__("Titulo")}}</label>
                                    <input type="text" name="space_internal_regime_title" class="form-control"
                                           placeholder="{{__("Enter title...")}}"
                                           value="{{setting_item_with_lang('space_internal_regime_title',request()->query('lang')) }}">
                                </div>
                                <div class="form-controls">
                                    <textarea name="space_internal_regime" class="d-none has-ckeditor" cols="30"
                                              rows="10">{{setting_item_with_lang('space_internal_regime',request()->query('lang')) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if(is_default_lang())
@php $languages = \Modules\Language\Models\Language::getActive(); @endphp
<hr>
<div class="row">
   <div class="col-sm-4">
      <h3 class="form-group-title">{{__("Contratos")}}</h3>
   </div>
   <div class="col-sm-8">
      <div class="panel">
         <div class="panel-title"><strong>{{__("Opções de contrato")}}</strong></div>
         <div class="panel-body">
            <div class="form-group">
               <ul class="nav nav-tabs">
                  <li class="nav-item">
                     <a class="nav-link active" data-toggle="tab" href="#hotel_contract">{{__("Contrato")}}</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-toggle="tab" href="#hotel_inspection_term">{{__("Termo de Vistoria")}}</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-toggle="tab" href="#hotel_internal_regime">{{__("Regimento Interno")}}</a>
                  </li>
               </ul>
               <div class="tab-content" >
                  <div class="tab-pane active" id="hotel_contract">
                     <div class="form-group" >
                        <label class="control-label">{{__("Titulo")}}</label>
                        <input type="text" name="hotel_contract_title" class="form-control" placeholder="{{__("Enter title...")}}" value="{{ setting_item_with_lang('hotel_contract_title',request()->query('lang'))}}">
                     </div>
                     <div class="form-controls">
                        <textarea name="hotel_contract" class="d-none has-ckeditor" cols="30" rows="10">{{setting_item_with_lang('hotel_contract',request()->query('lang')) }}</textarea>
                     </div>
                  </div>
                  <div class="tab-pane" id="hotel_inspection_term">
                     <div class="form-group">
                        <label class="control-label">{{__("Titulo")}}</label>
                        <input type="text" name="hotel_inspection_term_title" class="form-control" placeholder="{{__("Enter title...")}}" value="{{setting_item_with_lang('hotel_inspection_term_title',request()->query('lang')) }}">
                     </div>
                     <div class="form-controls">
                        <textarea name="hotel_inspection_term" class="d-none has-ckeditor" cols="30" rows="10">{{setting_item_with_lang('hotel_inspection_term',request()->query('lang')) }}</textarea>
                     </div>
                  </div>
                  <div class="tab-pane" id="hotel_internal_regime">
                     <div class="form-group">
                        <label class="control-label">{{__("Titulo")}}</label>
                        <input type="text" name="hotel_internal_regime_title" class="form-control" placeholder="{{__("Enter title...")}}" value="{{setting_item_with_lang('hotel_internal_regime_title',request()->query('lang')) }}">
                     </div>
                     <div class="form-controls">
                        <textarea name="hotel_internal_regime" class="d-none has-ckeditor" cols="30" rows="10">{{setting_item_with_lang('hotel_internal_regime',request()->query('lang')) }}</textarea>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endif

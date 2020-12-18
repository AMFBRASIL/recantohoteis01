<div class="modal fade" id="hotel_internal_regime">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <div class="row justify-content-between align-items-center w-100">
                    <div class="col h-100">
                        <h4 class="modal-title">{{setting_item_with_lang($title ,request()->query('lang'))}}</h4>
                    </div>
                    <div class="col-1 h-100">
                        <button class="btn btn-md btn-primary" style="padding: 7px 15px" onclick="window.print()"><i class='fa fa-print' style="font-size: 17px"></i></button>
                    </div>
                </div>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
               {!! setting_item_with_lang($content ,request()->query('lang')) !!}

            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">{{__("Close")}}</button>
            </div>
        </div>
    </div>
</div>


@section('footer')
<script>
</script>
@endsection


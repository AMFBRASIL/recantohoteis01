<div class="modal fade" id="{{$modal}}">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form method="post" class="modal-form" action="{{$url}}">
                @csrf
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">{{$title}}</h4>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="tab-content">
                        <div id="booking-detail-93" class="tab-pane active">
                            <span class="response-message"></span>
                            <br />
                            <div class="booking-review">
                                <div class="booking-review-content">
                                    <div class="review-section">
                                        {{ view($view) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <span type="btn" class="btn btn-primary modalSubmit">{{_('Salvar')}}</span>
                    <span class="btn btn-secondary" data-dismiss="modal">{{_('Fechar')}}</span>
                </div>
            </form>
        </div>
    </div>
</div>

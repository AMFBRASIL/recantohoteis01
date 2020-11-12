<tr>
    <td class="booking-history-type">
        @if($service = $booking->service)
            <i class="{{$service->getServiceIconFeatured()}}"></i>
        @endif
        <small>{{$booking->object_model}}</small>
    </td>
    <td>
        @if($service = $booking->service)
            @php
                $translation = $service->translateOrOrigin(app()->getLocale());
            @endphp
            <a target="_blank" href="{{$service->getDetailUrl()}}">
                {{$translation->title}}
            </a>
        @else
            {{__("[Deleted]")}}
        @endif
    </td>
    <td class="a-hidden">{{display_date($booking->created_at)}}</td>
    <td class="a-hidden">
        {{__("Start date")}} : {{display_date($booking->start_date)}} <br>
        {{__("End date")}} : {{display_date($booking->end_date)}} <br>
        {{__("Duration")}} :

        @if($booking->duration_days <= 1)
            {{__(':count day',['count'=>$booking->duration_days])}}
        @else
            {{__(':count days',['count'=>$booking->duration_days])}}
        @endif
    </td>
    <td>{{format_money($booking->total)}}</td>
    <td>{{format_money($booking->paid)}}</td>
    <td>{{format_money($booking->total - $booking->paid)}}</td>
    <td class="{{$booking->status}} a-hidden">{{$booking->statusName}}</td>
    <td width="2%">
        @if($service = $booking->service)
            @include ($service->checkout_booking_detail_modal_file ?? '')
            @include ($service->space_inspection_term ?? '', ['title' =>'space_inspection_term_title', 'content' => 'space_inspection_term'])
            @include ($service->space_contract ?? '', ['title' =>'space_contract_title', 'content' => 'space_contract'] )
            @include ($service->space_internal_regime ?? '', ['title' =>'space_internal_regime_title', 'content' => 'space_internal_regime'])
        @endif

        <div class="dropdown">
            <button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
            @if($service = $booking->service)
                <a class="dropdown-item" data-toggle="modal" data-target="#modal-booking-{{$booking->id}}">
                    {{__("Details")}}
                </a>
                @include ($service->checkout_booking_detail_modal_file ?? '')
            @endif

                <a href="{{route('user.booking.invoice',['code'=>$booking->code])}}" class="dropdown-item open-new-window mt-1" onclick="window.open(this.href); return false;">
                    {{__("Invoice")}}
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#space_modal">
                    {{__("Contrato")}}
                </a>
                @include ($service->space_contract ?? '', ['title' =>'space_contract_title', 'content' => 'space_contract'])

                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#space_inspection_term">
                    {{__("Vistoria")}}
                </a>
                @include ($service->space_inspection_term ?? '', ['title' =>'space_inspection_term_title', 'content' => 'space_inspection_term'])

                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#space_internal_regime">
                    {{__("Regras")}}
                </a>
                @include ($service->space_internal_regime ?? '', ['title' =>'space_internal_regime_title', 'content' => 'space_internal_regime'])
            </div>
        </div>
    </td>
</tr>

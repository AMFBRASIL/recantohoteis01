<div class="card_twocheckout mt-2">
	<div class="row">
		<div class="col-12 col-lg-6 mb-3">
			<div class="input-group">
				<input id="bravo_paypal_pro_name" name="card_name" class="form-control" placeholder="{{__("Card Name")}}">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="icofont-ui-v-card bg"></i></span>
				</div>
			</div>
		</div>
		<div class="col-12 col-lg-6 mb-3">
			<div class="input-group">
				<input id="bravo_paypal_pro_number" name="card_number" class="form-control" placeholder="{{__("Card Number")}}">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="icofont-credit-card"></i></span>
				</div>
			</div>
		</div>
		<div class="col-12 col-lg-6 mb-3">
			<div class="row">
				<div class="col-6 pr-0">
					<label class="item text-center"><span>{{__("Expiration Month")}}</span></label>
					<input id="bravo_paypal_pro_expiry_month" name="expiryMonth" class="form-control" placeholder="{{__("MM")}}">
				</div>
				<div class="col-6 pl-0">
					<label class="item text-center"><span>{{__("Expiration Year")}}</span></label>
					<input id="bravo_paypal_pro_expiry_year" name="expiryYear" class="form-control" placeholder="{{__("YY")}}">
				</div>
			</div>
		</div>
		<div class="col-12 col-lg-6 mb-3">
			<label class="item text-center"><span>{{__("CVC code")}}</span></label>
			<input id="bravo_paypal_pro_cvc" name="cvv" class="form-control" placeholder="{{__("CVC")}}">
		</div>
		<div class="card_paypal_pro_msg mb-3"></div>
	</div>
</div>
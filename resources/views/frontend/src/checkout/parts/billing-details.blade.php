<div class="row">
    <div class="col-lg-8 col-md-12">
        <div class="shop-billing-form">
            <h4 class="title">@lang('website.billing-details')</h4>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
            @if(session('success'))
                <div class="alert alert-success">{!! session('success') !!}</div>
            @endif
            @if(auth()->check())
                @include('frontend.src.checkout.form.auth')
            @else
                @include('frontend.src.checkout.form.no-auth')
            @endif

            <div class="form-group">
                <label for="cf_order_notes">@lang('website.order-notes') (@lang('website.optional') )</label>
                <textarea class="form-control" name="description" id="cf_order_notes"
                          placeholder="@lang('website.notes-and-special-requirements-about-your-order')."></textarea>
            </div>
        </div>
        <input type="hidden" name="form_payment" id="checkout-form-payment" value="stripe"/>
        <input type="hidden" name="form_shipping" id="checkout-shipping" :value="shipping_price"/>
        <input type="hidden" name="form_shipping_method" :value="shipping_method_value"/>
    </div>
    @include('frontend.src.checkout.form.payment')
</div>

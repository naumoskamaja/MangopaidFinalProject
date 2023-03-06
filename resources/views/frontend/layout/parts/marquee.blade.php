<div class="marquee">
    <div class="inner">
        <p>
            @if(isset($coupon) && $coupon!=null)
                Take {{$coupon->value}} @if($coupon->type == 1) % @else {!! $conf->currency !!} @endif off your order with code {{$coupon->code}}
            @elseif($conf->header_description!=null && strlen($conf->header_description)>50)
                {!! $conf->header_description !!}
            @endif
        </p>
    </div>
</div>

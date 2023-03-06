<div class=" col-lg-5">
    <div class="contact-info-wrapper">
        <div class="section-title">
            <h2 class="title">@lang('website.contact-info')</h2>
        </div>
        <div class="contact-info-content">
            @if($conf->address!='')
                <div class="align-top">
                    <div class="contact-info-item">
                        <div class="icon">
                            <i class="lastudioicon lastudioicon-pin-3-2"></i>
                        </div>
                        <div class="content">
                            <h4>{{$conf->address}}</h4>
                        </div>
                    </div>
                </div>
            @endif
            <div class="align-bottom">
                <div class="contact-info-item info-item2">
                    <div class="icon">
                        <span><i class="lastudioicon lastudioicon-mail"></i></span>
                    </div>
                    <div class="content">
                        <p>{{$conf->email}}</p>
                    </div>
                </div>
                <div class="contact-info-item">
                    <div class="icon">
                        <span><i class="lastudioicon lastudioicon-phone-call-2"></i></span>
                    </div>
                    <div class="content">
                        <p>{{$conf->phone}}</p>
                    </div>
                </div>
                <div class="contact-info-item info-item2">
                    <div class="icon">
                        <span><i class="lastudioicon lastudioicon-clock"></i></span>
                    </div>
                    <div class="content">
                        {!! html_entity_decode(  \App\Library\LibHelper::echoJson($conf->shop_information, __('website.lang'))) !!}
                    </div>
                </div>
            </div>
            <div class="align-bottom">
                <div class="contact-info-item social-icons-item mb-0 pb-0">
                    <div class="content">
                        <div class="social-widget">
                            @if($conf->facebook != '')<a href="{{$conf->facebook}}"><i
                                    class="lastudioicon lastudioicon-b-facebook"></i></a>@endif
                            @if($conf->instagram != '')<a href="{{$conf->instagram}}"><i
                                    class="lastudioicon lastudioicon-b-instagram"></i></a> @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

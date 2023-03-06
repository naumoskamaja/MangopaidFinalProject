<footer class="footer-area footer-style1">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-6">
                    <div class="footer-logo-area">
                        <a href="/">
                            <img class="logo-main" src="{{asset($conf->logo)}}" alt="Logo" />
                        </a>
                    </div>
                </div>
                <div class="col-md-8 col-lg-6">
                    <div class="newsletter-content-wrap">
                        <form method="post" action="{{url('/subscribe') }}" class="newsletter-form"
                              enctype="multipart/form-data">
                            @csrf
                            <input class="form-control" name="email" type="email" id="email"
                                   placeholder="@lang('website.email')">
                            @error('email') <span
                                class="error text-danger">{{ $message }}</span> @enderror

                            <button class="btn btn-theme"
                                    type="submit">@lang('website.subscribe')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-main">
        <div class="container">
            <div class="row row-gutter-0">
                <div class="col-sm-6 col-md-4">
                    <div class="widget-item">
                        <nav class="widget-menu-wrap">
                            <ul class="nav-menu nav">
                                <li><a href="/page/privacy_policy">@lang('website.privacy-policy')</a></li>
                                <li><a href="/page/terms_and_conditions">@lang('website.terms-and-conditions')</a></li>
                                <li><a href="/page/about">@lang('website.about')</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="widget-item mt-xs-20">
                        <nav class="widget-menu-wrap">
                            <ul class="nav-menu nav">
                                <li><a href="/contact">@lang('website.send-us-a-message')</a></li>
                                <li>
                                    <a href="/tracking" data-toggle="modal"
                                       data-target="#trackingModal" title="Order Tracking">
                                        @lang('website.track-my-order')</a>
                                </li>
                                <li><a href="/page/faq">@lang('website.frequently-asked-questions-faq')</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="widget-item widget-social-item mt-sm-30 mt-xs-20">
                        <span>@lang('website.on-social-networks')</span>
                        <div class="widget-social-icons">
                            @if($conf->facebook!=null)
                                <a href={{$conf->facebook}} target="_blank" class="ht-tooltip"
                                   data-tippy-content="Facebook"><i
                                        class="lastudioicon lastudioicon-b-facebook"></i></a>
                            @endif
                            @if($conf->instagram!=null)
                                <a href={{$conf->instagram}} target="_blank" class="ht-tooltip"
                                   data-tippy-content="Instagram"><i
                                        class="lastudioicon lastudioicon-b-instagram"></i></a>
                            @endif
                            @if($conf->tiktok!=null)
                                <a href={{$conf->tiktok}} target="_blank" class="ht-tooltip"
                                   data-tippy-content="TikTok">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="feather feather-facebook"
                                         style="background: white;" width="18px" height="18px" stroke="currentColor"
                                         viewBox="0 0 512 512" id="icons">
                                        <path
                                            d="M412.19,118.66a109.27,109.27,0,0,1-9.45-5.5,132.87,132.87,0,0,1-24.27-20.62c-18.1-20.71-24.86-41.72-27.35-56.43h.1C349.14,23.9,350,16,350.13,16H267.69V334.78c0,4.28,0,8.51-.18,12.69,0,.52-.05,1-.08,1.56,0,.23,0,.47-.05.71,0,.06,0,.12,0,.18a70,70,0,0,1-35.22,55.56,68.8,68.8,0,0,1-34.11,9c-38.41,0-69.54-31.32-69.54-70s31.13-70,69.54-70a68.9,68.9,0,0,1,21.41,3.39l.1-83.94a153.14,153.14,0,0,0-118,34.52,161.79,161.79,0,0,0-35.3,43.53c-3.48,6-16.61,30.11-18.2,69.24-1,22.21,5.67,45.22,8.85,54.73v.2c2,5.6,9.75,24.71,22.38,40.82A167.53,167.53,0,0,0,115,470.66v-.2l.2.2C155.11,497.78,199.36,496,199.36,496c7.66-.31,33.32,0,62.46-13.81,32.32-15.31,50.72-38.12,50.72-38.12a158.46,158.46,0,0,0,27.64-45.93c7.46-19.61,9.95-43.13,9.95-52.53V176.49c1,.6,14.32,9.41,14.32,9.41s19.19,12.3,49.13,20.31c21.48,5.7,50.42,6.9,50.42,6.9V131.27C453.86,132.37,433.27,129.17,412.19,118.66Z"/>
                                    </svg>
                                </a>
                            @endif
                            @if($conf->whatsapp!=null)
                                <a href="https://api.whatsapp.com/send?phone={{$conf->whatsapp}}" class="ht-tooltip"
                                   data-tippy-content="WhatsApp"><i
                                        class="lastudioicon lastudioicon-b-whatsapp"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

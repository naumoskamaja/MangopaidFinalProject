<footer class="footer-area footer-style6">
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-logo-area">
                        <a href="/">
                            <img class="logo-main" src="{{asset($conf->logo)}}" alt="Logo" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="row row-gutter-60">
                <div class="col-sm-6 col-lg-3">
                    <div class="widget-item">
                        <h4>@lang('website.contact-us')</h4>
                        <nav class="widget-menu-wrap">
                            <ul class="nav-menu nav">
                                <li><a href="/contact">{{$conf->address ?? ''}}</a></li>
                                <li><a href="mailto://{{$conf->email}}">{{$conf->email ?? ''}}</a></li>
                                <li><a href="tel://+54.8638.8583.43">{{$conf->phone ?? ''}}</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="widget-item ml-39 ml-md-0 mt-xs-30">
                        <h4>@lang('website.company')</h4>
                        <nav class="widget-menu-wrap">
                            <ul class="nav-menu nav">
                                <li><a href="/page/about">@lang('website.about')</a></li>
                                <li><a href="/search">@lang('website.shop')</a></li>
                                <li><a href="/contact">@lang('website.contact')</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="widget-item ml-45 ml-md-0 mt-md-30">
                        <h4>@lang('website.help')</h4>
                        <nav class="widget-menu-wrap">
                            <ul class="nav-menu nav">
                                <li><a href="/page/privacy_policy">@lang('website.privacy-policy')</a></li>
                                <li><a href="/page/terms_and_conditions">@lang('website.terms-and-conditions')</a></li>
                                <li><a href="/page/faq">@lang('website.faq')</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 pl-27 pl-md-15 mt-md-30">
                    <div class="widget-item">
                        <h4>@lang('website.social')</h4>
                        <div class="widget-social-icons">
                            @if($conf->facebook!=null)
                                <a href={{$conf->facebook}} target="_blank"><i
                                        class="lastudioicon lastudioicon-b-facebook"></i></a>
                            @endif
                            @if($conf->instagram!=null)
                                <a href={{$conf->instagram}} target="_blank"><i
                                        class="lastudioicon lastudioicon-b-instagram"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--== End Footer Area Wrapper ==-->

<!--== Scroll Top Button ==-->
<div class="scroll-to-top"><span class="icofont-arrow-up"></span></div>

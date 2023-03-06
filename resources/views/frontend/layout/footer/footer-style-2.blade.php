<footer class="footer-area default-style">
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="widget-item widget-column2">
{{--                        <div class="row mb-50">--}}
{{--                            <div class="col-12">--}}
{{--                                <div class="widget-item widget-column1">--}}
{{--                                    <h4>@lang('website.subscribe-to-receive-our-news')</h4>--}}
{{--                                    <div class="newsletter-content-wrap">--}}
{{--                                        <form method="post" action="{{url('/subscribe') }}" class="newsletter-form"--}}
{{--                                              enctype="multipart/form-data">--}}
{{--                                            @csrf--}}
{{--                                            <input class="form-control" name="email" type="email" id="email-footer"--}}
{{--                                                   placeholder="@lang('website.email')">--}}
{{--                                            @error('email') <span--}}
{{--                                                class="error text-danger">{{ $message }}</span> @enderror--}}

{{--                                            <button class="btn btn-theme btn-black"--}}
{{--                                                    type="submit">@lang('website.subscribe')</button>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="row">
                            <div class="col-12 mb-50">
                                <h4>@lang('website.about-us')</h4>
                                <nav class="widget-menu-wrap menu-col-2">
                                    <ul class="nav-menu nav">
                                        <li><a href="/page/about">@lang('website.who-are-we')</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <nav class="widget-menu-wrap" style="margin-top: 40px;">
                                <p>@lang('website.newsletters-description')<br> @lang('website.newsletters-description-2')
                                </p>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="widget-item widget-column2">
                        <div class="row">
                            <div class="col-sm-6 mb-50">
                                <h4>@lang('website.conditions')</h4>
                                <nav class="widget-menu-wrap">
                                    <ul class="nav-menu nav">
                                        <li><a href="/page/privacy_policy">@lang('website.privacy-policy')</a></li>
                                        <li><a href="/page/terms_and_conditions">@lang('website.terms-and-conditions')</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="col-sm-6">
                                <h4>@lang('website.assistance')</h4>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="widget-item">
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


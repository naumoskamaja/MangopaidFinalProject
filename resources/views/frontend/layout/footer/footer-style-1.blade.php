<footer class="footer-area default-style">
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="widget-item widget-column1">
                        <h4>@lang('website.subscribe-to-receive-our-news')</h4>
                        <div class="newsletter-content-wrap">
                            <form method="post" action="{{url('/subscribe') }}" class="newsletter-form"
                                  enctype="multipart/form-data">
                                @csrf
                                <input class="form-control" name="email" type="email" id="email"
                                       placeholder="@lang('website.enter-your-email-address')">
                                @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                                <button class="btn btn-theme btn-black"
                                        type="submit">@lang('website.subscribe')</button>
                            </form>
                        </div>
                        <nav class="widget-menu-wrap" style="margin-top: 40px;">
                            <p>@lang('website.newsletters-description')<br> @lang('website.newsletters-description-2')
                            </p>
                        </nav>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="widget-item widget-column2">
                        <h4>@lang('website.help')</h4>
                        <nav class="widget-menu-wrap menu-col-2">
                            <ul class="nav-menu nav">
                                <li><a href="/page/about">@lang('website.about')</a></li>
                                <li><a href="/contact">@lang('website.contact')</a></li>
                            </ul>
                            <ul class="nav-menu nav">
                                <li><a href="/page/privacy_policy">@lang('website.privacy-policy')</a></li>
                                <li><a href="/page/terms_and_conditions">@lang('website.terms-and-conditions')</a></li>
                                <li><a href="/page/faq">@lang('website.faq')</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="widget-item widget-column2">
                        <h4></h4>
                        <nav class="widget-menu-wrap">
                            {!! html_entity_decode(  \App\Library\LibHelper::echoJson($conf->shop_information, __('website.lang'))) !!}
                        </nav>
                    </div>
                </div>

                @if(auth()->check() && auth()->user()->role!='admin')
                    <div class="col-md-3">
                        <div class="widget-item widget-column3">
                            <h4>@lang('website.account')</h4>
                            <nav class="widget-menu-wrap">
                                <ul class="nav-menu nav">
                                    <li><a href="/profile">@lang('website.account')</a></li>
                                    <li><a href="/profile">@lang('website.purchases')</a></li>
                                    <li><a href="/logout">@lang('website.logout')</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="widget-item widget-column3">
                            <h4></h4>
                            <nav class="widget-menu-wrap menu-col-3">
                                <div class="widget-item">
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
                            </nav>
                        </div>

                    </div>
                @elseif(auth()->check() && auth()->user()->role=='admin')
                    <div class="col-md-3">
                        <div class="widget-item widget-column3">
                            <h4>@lang('website.account')</h4>
                            <nav class="widget-menu-wrap">
                                <ul class="nav-menu nav">
                                    <li><a href="/admin">@lang('website.manage-shop')</a></li>
                                    <li><a href="/logout">@lang('website.logout')</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="widget-item widget-column3">
                            <h4></h4>
                            <nav class="widget-menu-wrap menu-col-3">
                                <div class="widget-item">
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
                            </nav>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</footer>

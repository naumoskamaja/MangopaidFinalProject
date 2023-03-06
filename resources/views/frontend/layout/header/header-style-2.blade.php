<!--== Start Header Wrapper ==-->
<header
    class="header-area header-default sticky-header @if($conf->template==3) style-3-background @elseif($conf->template==4) style-4-background @endif"
    id="header">
    @include('frontend.layout.parts.marquee')
    <div class="container-fluid">
        <div class="row row-gutter-0 align-items-center">
            <div class="col-4 col-xs-3 col-sm-4 col-xl-1">
                <div class="header-logo-area">
                    <a href="/">
                        <img class="logo-main header-logo-size" src="{{asset($conf->logo)}}"
                             alt="Logo"/>
                        <img class="logo-light header-logo-size" src="{{asset($conf->logo)}}"
                             alt="Logo"/>
                    </a>
                </div>
            </div>
            <div class="col-md-9 col-xl-9 col-xxl-9 d-none d-xl-block">
                <div class="header-align">
                    <div class="header-navigation-area">
                        <ul class="main-menu nav justify-content-center position-relative">

                            <li><a href="/"
                                   class="@if($conf->template==3) style-3-color @elseif($conf->template==4) style-4-color @endif">@lang('website.home')</a>
                            </li>
                            @foreach($main_categories as $category)
                                @if(count($category->subcategories)>0)
                                    <li class="nav-item dropdown" id="menu-li">
                                        <a class="nav-link dropdown-toggle @if($conf->template==3) style-3-color @elseif($conf->template==4) style-4-color @endif "
                                           style="@if(strpos($category->title['en'], 'sale') !== false) font-weight:700;color: #D71E25; @endif"
                                           href="/search/{!! $category->id !!}/{!! urlencode($category->title[session('lang')??'en']) !!}"
                                           data-bs-toggle="dropdown" id="menuitems"
                                           onclick="routing(event)"
                                        > {{$category->title[session('lang')??'en']}} </a>

                                        <ul class="dropdown-menu" id="xxx">
                                            @foreach($category->subcategories as $subcategory)
                                                @if(count($subcategory->subcategories)>0)
                                                    <?php $fourSubsFlag = false; ?>
                                                    @foreach($subcategory->subcategories as $child)
                                                        @if(count($child->subcategories)>0)
                                                            <?php $fourSubsFlag = true; ?>
                                                        @endif
                                                    @endforeach
                                                    @if($fourSubsFlag == false)
                                                        {{--  three levels --}}
                                                        <li>
                                                            <a class="dropdown-item uppercase" onclick="routing(event)"
                                                               href="/search/{!! $subcategory->id !!}/{!! urlencode($category->title[session('lang')??'en']) !!}/{!! urlencode($subcategory->title[session('lang')??'en']) !!}">
                                                                {{$subcategory->title[session('lang')??'en']}}&raquo;
                                                            </a>
                                                            <ul class="submenu dropdown-menu">
                                                                @foreach($subcategory->subcategories as $child)
                                                                    <li>
                                                                        <a class="dropdown-item cat-subtitle"
                                                                           href="/search/{!! $child->id !!}/{!! urlencode($category->title[session('lang')??'en']) !!}/{!! urlencode($subcategory->title[session('lang')??'en']) !!}/{!! urlencode($child->title[session('lang')??'en']) !!}">
                                                                            {{$child->title[session('lang')??'en']}}
                                                                            ({{count($child->products)}})
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                        <li>
                                                        </li>
                                                    @else
                                                        {{--        four levels       --}}
                                                        <li class="has-megasubmenu" id="megamenu">
                                                            <a class="dropdown-item uppercase"
                                                               onclick="routing(event,{!! $subcategory->id !!})"
                                                               href="/search/{!! $subcategory->id !!}/{!! urlencode($category->title[session('lang')??'en']) !!}/{!! urlencode($subcategory->title[session('lang')??'en']) !!}">
                                                                {{$subcategory->title[session('lang')??'en']}} &raquo;
                                                            </a>

                                                            <div class="megasubmenu dropdown-menu" id="megasubmenu"
                                                                 style="min-width: 730px;">
                                                                <div class="row">
                                                                    @foreach($subcategory->subcategories as $child)
                                                                        <div class="col-4">
                                                                            <a href="/search/{!! $child->id !!}/{!! urlencode($category->title[session('lang')??'en']) !!}/{!! urlencode($subcategory->title[session('lang')??'en']) !!}/{!! urlencode($child->title[session('lang')??'en']) !!}"
                                                                               class="title cat-title">{{$child->title[session('lang')??'en']}}</a>
                                                                            <ul class="list-unstyled">
                                                                                @foreach($child->subcategories as $subtitle)
                                                                                    <li>
                                                                                        <a class="cat-subtitle"
                                                                                           href="/search/{!! $subtitle->id !!}/{!! urlencode($category->title[session('lang')??'en']) !!}/{!! urlencode($subcategory->title[session('lang')??'en']) !!}/{!! urlencode($child->title[session('lang')??'en']) !!}/{!! urlencode($subtitle->title[session('lang')??'en']) !!}">
                                                                                            {{$subtitle->title[session('lang')??'en']}}
                                                                                            ({{count($subtitle->products)}}
                                                                                            )
                                                                                        </a>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div><!-- end col-3 -->
                                                                    @endforeach
                                                                </div><!-- end row -->
                                                            </div>
                                                        </li>
                                                    @endif
                                                @else
                                                    <li><a class="dropdown-item uppercase"
                                                           href="/search/{!! $subcategory->id !!}/{!! urlencode($category->title[session('lang')??'en']) !!}/{!! urlencode($subcategory->title[session('lang')??'en']) !!}">{{$subcategory->title[session('lang')??'en']}} </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <li class="nav-item"><a
                                            class="nav-link @if($conf->template==3) style-3-color @elseif($conf->template==4) style-4-color @endif "
                                            style="@if(strpos($category->title['en'], 'sale') !== false) font-weight:700;color: #D71E25; @endif"
                                            href="/search/{!! $category->id !!}/{!! urlencode($category->title[session('lang')??'en']) !!}">{{$category->title[session('lang')??'en']}} </a>
                                    </li>
                                @endif
                            @endforeach
                            <li><a href="/page/about"
                                   class="@if($conf->template==3) style-3-color @elseif($conf->template==4) style-4-color @endif ">@lang('website.about')</a>
                            </li>
                            <li><a href="/contact"
                                   class="@if($conf->template==3) style-3-color @elseif($conf->template==4) style-4-color @endif ">@lang('website.contact')</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-8 col-md-8 col-lg-8 col-xl-2 col-xxl-2 col-xs-10 col-sm-8 ">
                <div class="header-action-area">
                    <div class="header-action-cart" style="padding-right: 10px">
                        @if(auth()->check())
                            <button
                                class="btn-login profile-icon ht-tooltip  @if($conf->template==3) style-3-color @elseif($conf->template==4) style-4-color @endif"
                                data-tippy-content="@lang('website.profile')">
                                <i class="lastudioicon-single-01-2"></i>
                            </button>
                        @else
                            {{--                            <button data-bs-toggle="modal" data-bs-target="#loginModal" style="border: none;background: none"--}}
                            {{--                                    id="loginButton" class="ht-tooltip" data-tippy-content="@lang('website.login')">--}}
                            {{--                                <span class="login-btn"><i class="lastudioicon-single-01-2"></i></span></button>--}}
                            <button data-bs-toggle="modal" data-bs-target="#loginModal"
                                    class="btn-cart ht-tooltip  @if($conf->template==3) style-3-color @elseif($conf->template==4) style-4-color @endif"
                                    data-tippy-content="@lang('website.login')" id="loginButton">
                                <i class="lastudioicon-single-01-2"></i>
                            </button>
                        @endif
                    </div>
                    <?php $counterWish = 0 ?>
                    @if(session('wishlist')!=null)
                        @foreach(session('wishlist') as $id => $details)
                            <?php $counterWish += 1 ?>
                        @endforeach
                    @endif

                    <div class="header-action-cart" style="margin-right: 10px;">
                        <a href="/wishlist"
                           class="btn-cart wish-icon ht-tooltip @if($conf->template==3) style-3-color @elseif($conf->template==4) style-4-color @endif"
                           data-tippy-content="@lang('website.wishlist')" title="@lang('website.wishlist')">
                            <span
                                class="cart-count @if($conf->template==3) style-3-color-reverse style-3-background-reverse @elseif($conf->template==4) style-4-color-reverse style-4-second-background @endif"
                                style="top: -6px !important; right: 1px !important;">{{$counterWish}}</span>
                            <i class="lastudioicon-heart-2" style="padding-right: 10px;"></i>
                        </a>
                    </div>
                    <?php $counter = 0 ?>
                    @if(session('cart')!=null)
                        @foreach(session('cart') as $id => $details)
                            <?php $counter += 1 ?>
                        @endforeach
                    @endif
                    <div class="header-action-cart" style="margin-right: 10px;">
                        <button
                            class="btn-cart cart-icon ht-tooltip  @if($conf->template==3) style-3-color @elseif($conf->template==4) style-4-color @endif"
                            data-tippy-content="@lang('website.cart')">
                            <span
                                class="cart-count @if($conf->template==3) style-3-color-reverse style-3-background-reverse @elseif($conf->template==4) style-4-color-reverse style-4-second-background @endif"
                                style="right: 1px">{{$counter}}</span>
                            <i class="lastudioicon-shopping-cart-2" style="padding-right: 10px"></i>
                        </button>
                    </div>
                    <div class="header-action-cart">
                        <?php
                        if (session('lang') != null)
                            $lang = session('lang');
                        else
                            $lang = 'en';
                        ?>
                        <a href="#"
                           class="lang-icon ht-tooltip  @if($conf->template==3) style-3-color @elseif($conf->template==4) style-4-color @endif"
                           data-tippy-content="@lang('website.'.$lang)" style="padding-right: 10px">
                            <img src="/assets/{{$lang}}.png" alt="{{$lang}}" height="12">
                        </a>
                    </div>
                    <div class="header-action-cart">
                        <!--                        --><?php
                        //                        $currency = '€';
                        //                        if (session('currency') != null)
                        //                            $currency = session('currency');
                        //                        ?>
                        <a href="#" class="currency-icon">
                            <span
                                class="cart-count top--6 @if($conf->template==3) style-3-color @elseif($conf->template==4) style-4-color @endif">{{session('currency') ??  '€'}}</span>
                        </a>
                    </div>
                    <button
                        class="btn-menu d-xl-none  @if($conf->template==3) style-3-color @elseif($conf->template==4) style-4-color @endif">
                        <i class="lastudioicon-menu-3-1"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>

<div id="loginModal" tabindex="-1" role="dialog" class="modal fade">
    <div role="document" class="modal-dialog ">
        <div class="modal-content" style="border-radius: 0.3rem">

            <div class="modal-body" style="padding-top:35px; padding-left:47px;padding-right:47px">
                <div class="icon d-flex align-items-center justify-content-center" style="border: none;width: 150px">
                    <img class="logo-main header-logo-size"
                         src="{{asset($conf->logo)}}"
                         alt="Logo">
                </div>
                <h4 id="largeModalLabel"
                    class="title text-center ">@lang('website.log_in')</h4>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group" style="margin-top: 20px">
                        <input type="email" id="UserName" name="email"
                               placeholder="@lang('website.email_address')"
                               class="form-control @error('email') is-invalid @enderror" style="height: 45px" required>
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group" style="margin-top: 20px">

                        <input type="password" name="password" id="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="@lang('website.password')"
                               style="height: 45px" required>
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn pay-button mt-3" type="submit"
                                style="width: 100%;height: 45px">@lang('website.log_in')</button>

                    </div>

                    <div style="float:right;margin-top: 15px">
                        <a href="/forgot-password">@lang('website.forgot_password')?</a>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-center" style="background-color: #f8f8f8;padding-bottom: 30px;border: none;
">
                <p>@lang('website.not-a-member')? <a href="/login">@lang('website.create_an_account')</a></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('website.close')</button>
            </div>
        </div>
    </div>
</div>
<style>
    .header-area.header-default .header-action-area .header-action-cart {
        margin-right: 3px !important;
    }

    .header-area.header-default .header-action-area .btn-menu {
        margin-left: 10px !important;
    }

    .header-area.header-default .header-action-area .btn-cart .cart-count {
        top: 3px !important;
    }

    @media only screen and (min-width: 577px) {
        .header-area.header-default .header-action-area .btn-cart .cart-count {
            top: 38px !important;
        }
    }
</style>


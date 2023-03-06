@extends('admin.layout.app')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing p-0">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div>
                    <div class="row layout-spacing">
                        <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">
                            <div class="user-profile layout-spacing">
                                <div class="widget-content widget-content-area">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="">@lang("website.profile")</h3>
                                        <a href="/admin/profile/settings" class="mt-2 edit-profile">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                 stroke-linejoin="round" class="feather feather-edit-3">
                                                <path d="M12 20h9"></path>
                                                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="text-center user-info">
                                        <img src="{{asset($conf->logo)}}" class="height-45" alt="avatar">
                                        <p class="">{{$conf->company_name}}</p>
                                    </div>
                                    <div class="user-info-list">

                                        <div class="">
                                            <ul class="contacts-block list-unstyled">

                                                <li class="contacts-block__item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                         stroke-linejoin="round" class="feather feather-map-pin">
                                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                                        <circle cx="12" cy="10" r="3"></circle>
                                                    </svg>
                                                    {{$conf->address}}
                                                </li>
                                                <li class="contacts-block__item">
                                                    <a href="mailto:example@mail.com">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                             stroke-linecap="round" stroke-linejoin="round"
                                                             class="feather feather-mail">
                                                            <path
                                                                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                                            <polyline points="22,6 12,13 2,6"></polyline>
                                                        </svg>
                                                        {{$conf->main_email}}</a>
                                                </li>
                                                <li class="contacts-block__item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                         stroke-linejoin="round" class="feather feather-phone">
                                                        <path
                                                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                                    </svg> {{$conf->tel}}
                                                </li>
                                                <li class="contacts-block__item">
                                                    <ul class="list-inline text-center">
                                                        <li class="list-inline-item">
                                                            @if($conf->facebook !=null )
                                                                <div class="social-icon">
                                                                    <a href="{{$conf->facebook}}" class="font-20">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                             stroke-width="2" stroke-linecap="round"
                                                                             stroke-linejoin="round" class="feather feather-facebook">
                                                                            <path
                                                                                d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                                                        </svg>
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        </li>
                                                        <li class="list-inline-item">
                                                            @if($conf->twitter !=null )
                                                                <div class="social-icon">
                                                                    <a href="{{$conf->twitter}}" class="font-20">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                             stroke-width="2" stroke-linecap="round"
                                                                             stroke-linejoin="round" class="feather feather-twitter">
                                                                            <path
                                                                                d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                                                        </svg>
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        </li>
                                                        <li class="list-inline-item">
                                                            @if($conf->instagram !=null )
                                                                <div class="social-icon">
                                                                    <a href="{{$conf->instagram}}" class="font-20">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                             stroke-width="2" stroke-linecap="round"
                                                                             stroke-linejoin="round" class="feather feather-instagram">
                                                                            <rect x="2" y="2" width="20" height="20" rx="5"
                                                                                  ry="5"></rect>
                                                                            <path
                                                                                d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                                                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                                                        </svg>

                                                                    </a>
                                                                </div>
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="education layout-spacing ">
                                <div class="widget-content widget-content-area">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="">@lang("website.delivery_and_payment_information")</h3>
                                    </div>
                                    <div class="timeline-alter">
                                        <div class="item-timeline">
                                            <div class="t-meta-date">
                                                <p class="">@lang("website.shipping_fee")</p>
                                            </div>
                                            <div class="t-dot">
                                            </div>
                                            <form action="/admin/company_info/add_shipping_fee" method="post">
                                                @csrf
                                                <div class="t-text pb-0 inline-flex">
                                                    <input name="shipping_fee" value="{{$conf->shipping_fee}}" class="form-control"
                                                           style="height: calc(0.4em + 1.4rem + 2px) !important;">
                                                    <button class="btn btn-dark btn-sm ml-2 height-30"
                                                            type="submit">@lang('website.save')</button>
                                                </div>
                                                <small class="pl-10"> Enter shipping price (€)*</small>
                                            </form>
                                        </div>

                                        <div class="item-timeline">
                                            <div class="t-meta-date">
                                                <p class="">@lang("website.payment_types")</p>
                                            </div>
                                            <div class="t-dot">
                                            </div>
                                            <div class="t-text">
                                                <p>@lang("website.pod")</p>
                                            </div>
                                        </div>
                                        <div class="item-timeline">
                                            <div class="t-meta-date">
                                                <p></p>
                                            </div>
                                            <div class="t-dot">
                                            </div>
                                            <div class="t-text">
                                                <p>Paypal</p>
                                            </div>
                                        </div>
                                        <div class="item-timeline">
                                            <div class="t-meta-date">
                                                <p></p>
                                            </div>
                                            <div class="t-dot">
                                            </div>
                                            <div class="t-text">
                                                <p>Bank Transfer</p>
                                            </div>
                                        </div>
                                        <div class="item-timeline">
                                            <div class="t-meta-date">
                                                <p class="">@lang("website.shipping")</p>
                                            </div>
                                            <div class="t-dot">
                                            </div>
                                            <div class="t-text">
                                                <p>@lang("website.delivery")</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">
                            <div class="bio layout-spacing ">
                                <div class="widget-content widget-content-area">
                                    <form action="/changePassword" method="post" class="akasha-billing-fields pb-50">
                                        @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                                <div class="alert alert-danger">{{ $error }}</div>
                                            @endforeach
                                        @endif
                                        @if(session('success'))
                                            <div class="alert alert-success">{!! session('success') !!}</div>
                                        @endif
                                        <div class="akasha-billing-fields">
                                            <h3>@lang("website.change_password")</h3>
                                            <p>@lang("website.provide_following_information")</p>
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="form-row form-row-first validate-required">
                                                        <label for="billing_full_name_input">@lang("website.current_password")
                                                            &nbsp;<abbr class="required" title="required">*</abbr></label>
                                                        <input type="password"
                                                               class="input-text form-control"
                                                               name="password"
                                                               id="billing_full_name_input"
                                                               placeholder="@lang("website.input_current_password")" required/>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <p class="form-row form-row-last validate-required validate-email">
                                                        <label for="billing_email" class="">@lang("website.new_password")<abbr
                                                                class="required"
                                                                title="required">*</abbr></label><input type="password"
                                                                                                        class="input-text form-control"
                                                                                                        name="new_password"
                                                                                                        id="billing_email"
                                                                                                        placeholder="@lang("website.enter_new_password")"
                                                                                                        required/>
                                                    </p>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <p class="form-row form-row-first">
                                                        <label for="address_input"
                                                               class="">@lang("website.confirm_new_password")</label>
                                                        <input type="password"
                                                               class="input-text form-control"
                                                               name="confirm_password"
                                                               id="address_input"
                                                               placeholder="@lang("website.confirm_new_password")"
                                                               autocomplete="address" required/>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="akasha-account-fields mt-5">
                                            <button type="submit" name="submit" class="add-to-cart btn btn-info">
                                                @lang("website.confirm") </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="bio layout-spacing ">
                                <div class="widget-content widget-content-area">
                                    <form action="/changeCurrencyRate" method="post" class="akasha-billing-fields pb-50">
                                        <div class="akasha-billing-fields">
                                            <h3>@lang("website.change_currency_rate")</h3>
                                            @csrf

                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <p class="form-row form-row-first validate-required">
                                                        <label for="albanian_lek">Lek
                                                            &nbsp;<abbr class="required" title="required">*</abbr></label>
                                                        <input type="number"
                                                               class="input-text form-control"
                                                               name="all"
                                                               id="albanian_lek"
                                                               value="1" readonly/>
                                                    </p>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <p class="form-row form-row-last validate-required validate-email">
                                                        <label for="euro" class="">€<abbr
                                                                class="required"
                                                                title="required">*</abbr></label>
                                                        <input type="number"
                                                               class="input-text form-control"
                                                               name="euro" step="0.0001"
                                                               id="euro"
                                                               @if(isset($currencyVal) && $currencyVal!=null) value="{{$currencyVal->eur}}"
                                                               @endif
                                                               required/>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="akasha-account-fields mt-5">
                                            <button type="submit" name="submit" class="add-to-cart btn btn-info">
                                                @lang("website.confirm") </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="footer-wrapper">
                        <div class="footer-section f-section-1">
                            <p class="">Copyright © 2022, All rights
                                reserved.</p>
                        </div>
                        <div class="footer-section f-section-2">
                            <p class="">Coded with
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                     class="feather feather-heart">
                                    <path
                                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                </svg>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

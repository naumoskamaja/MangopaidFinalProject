<!DOCTYPE html>
<html lang="en">
<head>
    <base href="../../../../">
    <meta charset="utf-8"/>
    <title>Invoice</title>
    <meta name="description" content="User profile overview example"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="canonical" href="https://keenthemes.com/metronic"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <link href="/assets/profile/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/profile/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/profile/css/style.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/profile/css/custom.css" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="/assets/logo-v1.png"/>
</head>
<body id="kt_body" class=" subheader-enabled page-loading" style="background: #f9f9f9 !important">
<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-row flex-column-fluid page">
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            <div id="kt_header_mobile" class="header-mobile header-mobile-fixed">
                <a href="/">
                    <img alt="Logo" src="{{asset($conf->logo) ?? ''}}" class="max-h-30px" style="max-height: 30px !important;"/>
                </a>
            </div>
            <div id="kt_header" class="header flex-column header-fixed">
                <div class="header-top" style="background: #fff;">
                    <div class="container">
                        <div class="d-none d-lg-flex align-items-center mr-3">

                            <a href="/" class="mr-20">
                                <img alt="Logo" src="{{asset($conf->logo)}}" class="max-h-40px" style="max-height: 40px !important;"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row flex-column-fluid container">
                <div class="main d-flex flex-column flex-row-fluid">
                    <div class="subheader py-2 py-lg-6 subheader-transparent" style="background: #f9f9f9;"
                         id="kt_subheader">
                        <div
                            class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                        </div>
                    </div>
                    <div class="subheader  subheader-transparent" style="background: #f9f9f9;" id="kt_subheader">
                        <div
                            class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                        </div>
                    </div>
                    <div class="content flex-column-fluid" id="kt_content" style="background: #f9f9f9">
                        <div class="content flex-column-fluid" id="kt_content" style="background: #f9f9f9">
                            <div class="card card-custom overflow-hidden">
                                <div class="card-body p-0">
{{--                                            <form method='post' action="/invoice/pdf/{{$order->id}}">--}}
{{--                                                <input type="hidden" name='_token' value="">--}}
{{--                                                <button type="submit" style="border: 0px; background: none;float: right;margin-top: 80px;">--}}
{{--                                                                    <span class="svg-icon svg-icon-primary svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--																		<rect x="0" y="0" width="24" height="24"/>--}}
{{--																		<path d="M2,13 C2,12.5 2.5,12 3,12 C3.5,12 4,12.5 4,13 C4,13.3333333 4,15 4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 C2,15 2,13.3333333 2,13 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>--}}
{{--																		<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 8.000000) rotate(-180.000000) translate(-12.000000, -8.000000) " x="11" y="1" width="2" height="14" rx="1"/>--}}
{{--																		<path d="M7.70710678,15.7071068 C7.31658249,16.0976311 6.68341751,16.0976311 6.29289322,15.7071068 C5.90236893,15.3165825 5.90236893,14.6834175 6.29289322,14.2928932 L11.2928932,9.29289322 C11.6689749,8.91681153 12.2736364,8.90091039 12.6689647,9.25670585 L17.6689647,13.7567059 C18.0794748,14.1261649 18.1127532,14.7584547 17.7432941,15.1689647 C17.3738351,15.5794748 16.7415453,15.6127532 16.3310353,15.2432941 L12.0362375,11.3779761 L7.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000004, 12.499999) rotate(-180.000000) translate(-12.000004, -12.499999) "/>--}}
{{--																	</g>--}}
{{--																</svg></span></button>--}}
{{--                                            </form>--}}

                                    <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
                                        <div class="col-md-9">
                                            <div
                                                class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                                                <h1 class="display-4 font-weight-boldest mb-10 ">@lang('website.invoice')</h1>
                                                <div class="d-flex flex-column align-items-md-end px-0">
                                                    <h3>{{$conf->company_name}}</h3>
                                                    <span class="d-flex flex-column align-items-md-end opacity-70">
																<span>{{$conf->address}}</span>
																<span>{{$conf->phone}}</span>
																<span>{{$conf->email}}</span>
															</span>
                                                </div>
                                            </div>
                                            <div class="border-bottom w-100"></div>
                                            <div class="d-flex justify-content-between pt-6">
                                                <div class="d-flex flex-column flex-root">
                                                    <span class="font-weight-bolder mb-2">@lang('website.date')</span>
                                                    <span
                                                        class="opacity-70">{{\Illuminate\Support\Str::substr($order->created_at,0,10)}}</span>
                                                </div>

                                                <div class="d-flex flex-column flex-root text-right">
                                                    <span
                                                        class="font-weight-bolder mb-2"> @lang('website.invoice_to'): </span>
                                                    <span class="opacity-70">{{$order->name}} {{$order->lastname}}, {{$order->address}}
															<br/>{{$order->zip}} {{$order->city}}, {{$order->country}}
															<br/>@lang('website.email'): {{$order->email}}
															<br/> @lang('website.phone_number'): {{$order->phone}}
                                                        <br/><hr> @lang('website.payment_method'):
                                                         @if($order->payment_method=='payment-on-delivery')
                                                            @lang('website.cash-on-delivery')
                                                        @else
                                                            @lang('website.bank-transfer')
                                                        @endif
														</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                                        <div class="col-md-9">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th class="pl-0 font-weight-bold text-muted text-uppercase"></th>
                                                        <th class="pl-0 font-weight-bold text-muted text-uppercase">SKU
                                                        </th>
                                                        <th class="text-left font-weight-bold text-muted text-uppercase align-center">@lang('website.name')</th>
                                                        <th class="text-left pr-0 font-weight-bold text-muted text-uppercase align-center">@lang('website.size')</th>
                                                        <th class="text-left pr-0 font-weight-bold text-muted text-uppercase align-center">@lang('website.price')</th>
                                                        <th class="text-left font-weight-bold text-muted text-uppercase align-center">@lang('website.quantity')</th>
                                                        <th class="text-left font-weight-bold text-muted text-uppercase align-right">@lang('website.total')</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($order->items as $item )
                                                        <tr class="font-weight-600">
                                                            <td class="pl-0 pt-7 align-left">
                                                                <img class="order-item-image"
                                                                     style="height: 100px; width: 100px; object-fit: contain;"
                                                                     src="@if($item->color!="")
                                                                     {{$item->color}}
                                                                     @elseif($item->image!="")
                                                                     {{$item->image}}
                                                                     @else
                                                                         /assets/noimg.png @endif"/>
                                                            </td>
                                                            <td class="light-gray pl-0 pt-7 align-left"
                                                                style="    width: 40px;">
                                                                @if($item->sku!="") {{$item->sku}} @else {{$item->product->code}} @endif
                                                            </td>

                                                            <td class="light-gray text-left pt-7 align-center">
                                                                {{\App\Library\LibHelper::echoJson($item->product->name,__('website.lang'))}}
                                                            </td>
                                                            <td class="light-gray text-right pt-7 align-center">{{$item->size}}</td>
                                                            <td class="dark-gray pr-0 pt-7 align-center">{!! \App\Library\ConfigurationHelper::currency( $item->price ) !!}</td>
                                                            <td class="dark-gray pr-0 pt-7 align-center">{{$item->qty}}</td>
                                                            <td class="dark-gray pr-0 pt-7 align-right">{!! \App\Library\ConfigurationHelper::currency( $item->total ) !!}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0"
                                         style="background: #f9f9f9">
                                        <div class="col-md-9">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th class="font-weight-bold text-muted text-uppercase">@lang('website.subtotal')</th>
                                                        <th class="font-weight-bold text-muted text-uppercase align-center">@lang('website.discount')</th>
                                                        <th class="font-weight-bold text-muted text-uppercase align-center">@lang('website.shipping_price')</th>
                                                        <th class="font-weight-bold text-muted text-uppercase align-right">@lang('website.total')</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="font-weight-bolder">
                                                        <td>{!! \App\Library\ConfigurationHelper::currency( $order->subtotal ) !!}</td>
                                                        <td class="align-center">{!! \App\Library\ConfigurationHelper::currency( $order->discount ) !!}</td>
                                                        <td class="align-center">{!! \App\Library\ConfigurationHelper::currency( $order->shipping_price) !!}</td>
                                                        <td class="light-brown-theme font-size-h3 font-weight-boldest align-right right"
                                                            style="color: #000 !important;">{!! \App\Library\ConfigurationHelper::currency($order->total) !!} </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                                        <div class="col-md-9">
                                            <div class="d-flex justify-content-between">
                                                <form method='post' action="/invoice/pdf/{{$order->id}}">
                                                    @csrf
                                                    <button type="submit"
                                                            class="btn light-btn font-weight-bold">@lang('website.download-invoice')</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                <div class="container d-flex flex-column flex-md-row align-items-scenter justify-content-between">
                    <div class="text-dark order-2 order-md-1">
                        <span class="text-muted font-weight-bold mr-2">2022</span>
                        <a href="/" target="_blank" class="text-dark-75 text-hover-primary">{{$conf->company_name}}</a>
                    </div>
                    <div class="nav nav-dark order-1 order-md-2">
                        <a href="/about" target="_blank" class="nav-link pr-3 pl-0">@lang('website.about')</a>
                        <a href="/contact" target="_blank" class="nav-link pl-3 pr-0">@lang('website.contact')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="kt_scrolltop" class="scrolltop">
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                     height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24"/>
						<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1"/>
						<path
                            d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                            fill="#000000" fill-rule="nonzero"/>
					</g>
				</svg>
			</span>
</div>
<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
<script>var KTAppSettings = {
        "breakpoints": {"sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200},
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#6993FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#F3F6F9",
                    "dark": "#212121"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1E9FF",
                    "secondary": "#ECF0F3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#212121",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#ECF0F3",
                "gray-300": "#E5EAEE",
                "gray-400": "#D6D6E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#80808F",
                "gray-700": "#464E5F",
                "gray-800": "#1B283F",
                "gray-900": "#212121"
            }
        },
        "font-family": "Poppins"
    };</script>
<script src="/assets/profile/plugins/global/plugins.bundle.js"></script>
<script src="/assets/profile/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="/assets/profile/js/scripts.bundle.js"></script>
<script src="/assets/profile/js/pages/widgets.js"></script>
<script src="/assets/profile/js/pages/custom/profile/profile.js"></script>
</body>
</html>
<script>
    function changeTab(tab) {
        let divs = document.querySelectorAll('.my-tabs');
        divs.forEach((el) => {
            el.classList.remove('active')
        });
    }
</script>

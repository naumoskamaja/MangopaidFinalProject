@extends('admin.layout.app')
@section('content')

    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="row">
                            <div class="col-6">
                                <h4>#000{{$order->id}}</h4>
                            </div>
                            <div class="col-6">
                                <div class="invoice-action text-right">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-printer action-print"
                                         data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                        <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                        <path
                                            d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                                        <rect x="6" y="14" width="12" height="8"></rect>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="invoice">
                            <div id="ct" class="">
                                <div class="invoice-00001">
                                    <div class="content-section  animated animatedFadeInUp fadeInUp y-scroll">
                                        <div class="row inv--head-section">
                                            <div class="col-sm-6 col-12">
                                                <h3 class="in-heading">@lang("website.invoice")</h3>
                                            </div>
                                            <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                <div class="company-info">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row inv--detail-section">
                                            <div class="col-sm-7 align-self-center">
                                                <p class="inv-to">@lang("website.invoice_to"):</p>
                                            </div>
                                            <div class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                                <p class="inv-detail-title">@lang("website.from")
                                                    : {{$conf->company_name}}</p>
                                            </div>
                                            <div class="col-sm-7 align-self-center">
                                                <p class="inv-customer-name">{{$order->name}}</p>
                                                <p class="inv-email-address">{{$order->phone}}</p>
                                                <p class="inv-email-address">{{$order->email}}</p>
                                                <p class="inv-street-addr">{{$order->address}}</p>
                                                <p class="inv-street-addr">{{$order->zip}} {{$order->city}}
                                                    , {{$order->country}}</p>
                                            </div>
                                            <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                <p class="inv-list-number"><span class="inv-title"></span><span
                                                        class="inv-number">{{$conf->email}}</span></p>
                                                <p class="inv-list-number"><span class="inv-title"> </span><span
                                                        class="inv-number">{{$conf->phone}}</span></p>
                                                <p class="inv-list-number"><span class="inv-title">@lang("website.invoice_number") : </span>
                                                    <span class="inv-number">[ {{$order->id}} ]</span></p>
                                                <p class="inv-created-date"><span class="inv-title">@lang("website.invoice_date") : </span>
                                                    <span class="inv-date">{{$order->created_at}}</span></p>
                                                <hr/>
                                                @lang('website.payment-method'):
                                                @lang('website.'.$order->payment_method)
                                                <br/>
                                            </div>
                                        </div>
                                        <div class="row inv--product-table-section">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead class="">
                                                        <tr>
                                                            <th scope="col">S.No</th>
                                                            <th scope="col">@lang("website.code")</th>
                                                            <th scope="col">@lang("website.title")</th>
                                                            <th class="text-center"
                                                                scope="col">@lang("website.size")</th>
                                                            <th class="text-right"
                                                                scope="col">@lang("website.unit_price")</th>
                                                            <th class="text-right"
                                                                scope="col">@lang("website.quantity")</th>
                                                            <th class="text-right"
                                                                scope="col">@lang("website.amount")</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        @foreach($order->items as $item)
                                                            <tr>
                                                                <td>
                                                                    <img class="order-item-image"
                                                                         src="{{\App\Library\ProductsHelper::get_image($item->image)}}"/>
                                                                </td>
                                                                <td>
                                                                    @if($item->sku!="")
                                                                        {{$item->sku}}
                                                                    @else
                                                                        {{$item->product->code}}
                                                                    @endif
                                                                </td>
                                                                <td>{{\App\Library\LibHelper::echoJson($item->product->name,__('website.lang'))}}</td>
                                                                <td class="text-center">@if($item->size!='') {{$item->size}} @else
                                                                        - @endif</td>
                                                                <td class="text-right">
                                                                    @if($item->discount>0)
                                                                        <span
                                                                            style="text-decoration:line-through">
                                                                            {{ $item->price + $item->discount}} {{$conf->currency ?? '€'}}
                                                                        </span>
                                                                    @endif
                                                                    {{$item->price}} {{$conf->currency ?? '€'}}
                                                                </td>
                                                                <td class="text-right">{{$item->qty}}</td>
                                                                <td class="text-right">
                                                                    {{$item->total}} {{$conf->currency ?? '€'}}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                <div class="inv--payment-info">
                                                    @if($order->comment!=null)
                                                        <div class="row">
                                                            <div class="col-sm-12 col-12">
                                                                <h6 class=" inv-title">@lang("website.additional_info")
                                                                    :</h6>
                                                            </div>
                                                            <div class="col-sm-4 col-12">
                                                                <p class=" inv-subtitle">{{$order->comment}} </p>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                <div class="inv--total-amounts text-sm-right">
                                                    <div class="row">
                                                        <div class="col-sm-8 col-7">
                                                            <p class="">@lang("website.sub_total"): </p>
                                                        </div>
                                                        <div class="col-sm-4 col-5">
                                                            <p class="">
                                                                {{$order->subtotal}} {{$conf->currency ?? '€'}}
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-8 col-7">
                                                            <p class="">@lang("website.shipping_price"): </p>
                                                        </div>
                                                        <div class="col-sm-4 col-5">
                                                            <p class="">
                                                                {{$order->shipping_price}} {{$conf->currency ?? '€'}}
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-8 col-7">
                                                            <p class=" discount-rate">@lang("website.discount"): </p>
                                                        </div>
                                                        <div class="col-sm-4 col-5">
                                                            <p class="">
                                                                {{$order->discount}} {{$conf->currency ?? '€'}}
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-8 col-7 grand-total-title">
                                                            <p class="">@lang("website.grand_total"): </p>
                                                        </div>
                                                        <div class="col-sm-4 col-5 grand-total-amount">
                                                            <p class="">
                                                                {{$order->total}} {{$conf->currency ?? '€'}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

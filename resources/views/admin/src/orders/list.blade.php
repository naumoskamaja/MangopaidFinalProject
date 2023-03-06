@extends('admin.layout.app')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="row">
                            <div class="col-12">
                                <h4>@lang("website.manage_orders")</h4>
                            </div>
                        </div>
                        <hr/>
                        <div>
                            <form class="w-100" action="" method="GET" id="orders-form">
                                <div class="row">
                                    <div class="col-md-12 mb-20">
                                        <input name="search" placeholder="Search here.." type="text"
                                               class="form-control"
                                               value="{{$search}}" onkeyup="submitForm()"
                                        />
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-12 p-0 pt-3 pb-3">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>@sortablelink('id', __('website.id'))</th>
                                            <th>@lang("website.user")</th>
                                            <th>@sortablelink('date', __('website.date'))</th>
                                            <th class="text-center">@lang("website.payment_method")</th>
                                            <th class="text-center">@lang("website.shipping")</th>
                                            <th class="text-center">@lang("website.discount")</th>
                                            <th class="text-center">@lang("website.total")</th>
                                            <th class="text-center">@sortablelink('status', __('website.status'))</th>
                                            <th class="text-center">@lang("website.actions")</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>
                                                    @if($order->client_id==0)
                                                        {{ $order->name }} (guest)
                                                    @else
                                                        {{ $order->name }}
                                                    @endif
                                                </td>
                                                <td class="text-center">{{ $order->created_at }} </td>
                                                <td class="text-center">
                                                    @lang('website.'.$order->payment_method)
                                                </td>
                                                <td class="text-center">
                                                    @lang('website.delivery')
                                                    <p>{{ $order->shipping_price}} {{$conf->currency ?? '€'}}</p>
                                                </td>
                                                <td class="text-center">{{ $order->discount}} {{$conf->currency ?? '€'}}</td>
                                                <td class="text-center">{{ $order->total}} {{$conf->currency ?? '€'}} </td>
                                                <td class="text-center">
                                                    @if($order->status==0)
                                                        <span type="button" data-toggle="dropdown" aria-haspopup="true"
                                                              aria-expanded="false"
                                                              class="dropdown-toggle badge outline-badge-pending order-status-btn">@lang("website.pending")</span>
                                                    @elseif($order->status==1)
                                                        <span type="button" data-toggle="dropdown" aria-haspopup="true"
                                                              aria-expanded="false"
                                                              class="dropdown-toggle badge outline-badge-paid order-status-btn">@lang("website.paid")</span>
                                                    @elseif($order->status==2)
                                                        <span type="button" data-toggle="dropdown" aria-haspopup="true"
                                                              aria-expanded="false"
                                                              class="dropdown-toggle badge outline-badge-primary order-status-btn">@lang("website.confirmed")</span>
                                                    @elseif($order->status==3)
                                                        <span type="button" data-toggle="dropdown" aria-haspopup="true"
                                                              aria-expanded="false"
                                                              class="dropdown-toggle badge outline-badge-warning order-status-btn">@lang("website.sent")</span>
                                                    @elseif($order->status==4)
                                                        <span type="button" data-toggle="dropdown" aria-haspopup="true"
                                                              aria-expanded="false"
                                                              class="dropdown-toggle badge outline-badge-info order-status-btn">@lang("website.shipped")</span>
                                                    @elseif($order->status==5)
                                                        <span type="button" data-toggle="dropdown" aria-haspopup="true"
                                                              aria-expanded="false"
                                                              class="dropdown-toggle badge outline-outline-badge-info order-status-btn">@lang("website.rejected")</span>

                                                    @endif
                                                    <div class="dropdown-menu">
                                                        <div class="dropdown-item"><span
                                                                class="badge outline-badge-pending order-status-btn"><a
                                                                    href="/admin/order/{{$order->id}}/changeStatus/0">@lang("website.pending")</a> </span>
                                                        </div>
                                                        <div class="dropdown-item"><span
                                                                class="badge outline-badge-paid order-status-btn"><a
                                                                    href="/admin/order/{{$order->id}}/changeStatus/1">@lang("website.paid")</a> </span>
                                                        </div>
                                                        <div class="dropdown-item"><span
                                                                class="badge outline-badge-primary order-status-btn"><a
                                                                    href="/admin/order/{{$order->id}}/changeStatus/2">@lang("website.confirmed")</a> </span>
                                                        </div>
                                                        <div class="dropdown-item"><span
                                                                class="badge outline-badge-warning order-status-btn"><a
                                                                    href="/admin/order/{{$order->id}}/changeStatus/3">@lang("website.sent")</a> </span>
                                                        </div>
                                                        <div class="dropdown-item"><span
                                                                class="badge outline-badge-info order-status-btn"><a
                                                                    href="/admin/order/{{$order->id}}/changeStatus/4">@lang("website.shipped")</a></span>
                                                        </div>
                                                        <div class="dropdown-item"><span
                                                                class="badge outline-outline-badge-info order-status-btn"><a
                                                                    href="/admin/order/{{$order->id}}/changeStatus/5">@lang("website.rejected")</a></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-right">
                                                    <a href="/admin/order/invoice/{{$order->id}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                             viewBox="0 0 24 24"
                                                             fill="none" stroke="currentColor" stroke-width="2"
                                                             stroke-linecap="round"
                                                             stroke-linejoin="round" class="feather feather-eye">
                                                            <path
                                                                d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {!! $orders->appends(Request::except('page'))->render('pagination') !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function submitForm(){
            document.getElementById('orders-form').submit();
        }
    </script>
@endsection

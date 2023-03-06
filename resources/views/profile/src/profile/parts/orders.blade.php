<div class="tab-pane show active" id="nav-orders">
    <div class="main d-flex flex-column flex-row-fluid">
        <div class="subheader py-2 py-lg-4 subheader-transparent" id="kt_subheader">
            <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">@lang('website.orders')</h5>
                </div>
            </div>
        </div>
        <div class="content flex-column-fluid" id="kt_content">
            @if(count($orders)==0)
                <div class="alert alert-secondary">@lang('website.there-are-no-orders-yet')!</div>
            @else
                @foreach ($orders as $order)
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  ">
                            <div class="card card-custom gutter-b card-stretch">
                                <div class="card-body pt-4 pb-4 order-card">
                                    <div class="row" style="display: flex; justify-content:center; align-items:center">
                                        <?php $orderImage = asset('/assets/noimage.png'); ?>
                                        @foreach($order->items as $item)
                                            @if(count($item->product->images)>0)
                                                <?php $orderImage = $item->product->images[0]->image; ?>
                                            @endif
                                        @endforeach
                                        <div class=" col-xl-3 col-lg-4 col-md-3 col-sm-5 col-xs-6">
                                            <div class="flex-shrink-0 ">
                                                <div class=" row " style="justify-content: center">
                                                    <img src="{{$orderImage}}" alt="image" style="width: 100%;
                                                        max-width: 122px;
                                                        height: auto;border-radius:5px"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" col-xl-9 col-lg-8 col-md-9 col-sm-7 col-xs-6">
                                            <div class="d-flex justify-content-end">
                                                <div class="dropdown dropdown-inline" data-toggle="tooltip"
                                                     title="Get Invoice" data-placement="left">
                                                    <a href="/invoice/{{$order->id}}"
                                                       class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" d>
                                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo11\dist/../src/media/svg/icons\Files\Download.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                        viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path
                                                            d="M2,13 C2,12.5 2.5,12 3,12 C3.5,12 4,12.5 4,13 C4,13.3333333 4,15 4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 C2,15 2,13.3333333 2,13 Z"
                                                            fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                        <rect fill="#000000" opacity="0.3"
                                                              transform="translate(12.000000, 8.000000) rotate(-180.000000) translate(-12.000000, -8.000000) "
                                                              x="11" y="1" width="2" height="14" rx="1"/>
                                                        <path
                                                            d="M7.70710678,15.7071068 C7.31658249,16.0976311 6.68341751,16.0976311 6.29289322,15.7071068 C5.90236893,15.3165825 5.90236893,14.6834175 6.29289322,14.2928932 L11.2928932,9.29289322 C11.6689749,8.91681153 12.2736364,8.90091039 12.6689647,9.25670585 L17.6689647,13.7567059 C18.0794748,14.1261649 18.1127532,14.7584547 17.7432941,15.1689647 C17.3738351,15.5794748 16.7415453,15.6127532 16.3310353,15.2432941 L12.0362375,11.3779761 L7.70710678,15.7071068 Z"
                                                            fill="#000000" fill-rule="nonzero"
                                                            transform="translate(12.000004, 12.499999) rotate(-180.000000) translate(-12.000004, -12.499999) "/>
                                                    </g>
                                                </svg>
                                                </span>
                                                    </a>
                                                </div>
                                            </div>

                                            <!--begin::User-->
                                            <div class="d-flex align-items-center mb-7">
                                                <div class="d-flex flex-column">
                                                    <a href="/{{ $order->id}}/order_tracking"
                                                       class="text-dark font-weight-bold text-hover-primary font-size-h6 mb-0">@lang('website.order_no')
                                                        : {{$order->id}}</a>

                                                    <span class="text-muted font-weight-bold align-left">
                                                        <p class="font-9">{{ $order->created_at->format('d')}} {{$order->created_at->format('F')}} {{$order->created_at->format('Y') }}</p>
                                                    @switch($order->status)
                                                        @case(0):
                                                        <span
                                                            class="label label-secondary  label-pill label-inline mr-2 ml-0">@lang('website.pending')</span>
                                                        @break
                                                        @case(1):
                                                        <span
                                                            class="label label-light-success  label-pill label-inline mr-2 ml-0">@lang('website.paid')</span>
                                                        @break
                                                        @case(2):
                                                        <span
                                                            class="label label-primary  label-pill label-inline mr-2 ml-0">@lang('website.confirmed')</span>
                                                        @break
                                                        @case(3):
                                                        <span
                                                            class="label label-warning  label-pill label-inline mr-2 ml-0">@lang('website.sent')</span>
                                                        @break
                                                        @case(4):
                                                        <span
                                                            class="label label-success  label-pill label-inline mr-2 ml-0">@lang('website.shipped')</span>
                                                        @break
                                                        @default
                                                        <span
                                                            class="label label-danger  label-pill label-inline mr-2 ml-0">@lang('website.rejected')</span>
                                                    @endswitch
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="mb-7">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="text-dark-75 font-weight-bolder mr-2">@lang('website.subtotal'): </span>
                                                    <span
                                                        class="text-muted">{!! \App\Library\ConfigurationHelper::currency( $order->subtotal ) !!}</span>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center my-1">
                                                    <span class="text-dark-75 font-weight-bolder mr-2">@lang('website.shipping'): </span>
                                                    <span href="#"
                                                          class="text-muted">{!! \App\Library\ConfigurationHelper::currency( $order->shipping_price ) !!}</span>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="text-dark-75 font-weight-bolder mr-2">@lang('website.discount'): </span>
                                                    <span
                                                        class="text-muted">{!! \App\Library\ConfigurationHelper::currency( $order->discount ) !!}</span>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="text-dark-75 font-weight-bolder mr-2">@lang('website.total'): </span>
                                                    <span
                                                        class="text-muted">{!! \App\Library\ConfigurationHelper::currency( $order->total ) !!}</span>
                                                </div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

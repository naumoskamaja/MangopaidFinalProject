<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-table-two p-15">
        <div class="widget-heading">
            <h5 class="">@lang("website.recent_orders")</h5>
        </div>
        <div class="widget-content">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>
                            <div class="th-content">@lang("website.order_no")</div>
                        </th>
                        <th>
                            <div class="th-content">@lang("website.customer")</div>
                        </th>
                        <th>
                            <div class="th-content th-heading">@lang("website.price")</div>
                        </th>
                        <th>
                            <div class="th-content">@lang("website.status")</div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $latest_orders = \App\Library\DashboardHelper::getLatestOrders(); ?>
                    @foreach($latest_orders as $order)
                        <tr>
                            <td>
                                <div class="td-content customer-name">{{$order->id}}</div>
                            </td>
                            <td>
                                <div class="td-content product-brand">
                                    @if($order->client_id==0) @lang('website.guest'): @endif
                                    {{$order->name}}
                                </div>
                            </td>
                            <td>
                                <div class="td-content pricing"><span
                                        class="">{{$order->total}} €</span>
                                </div>
                            </td>
                            <td>
                                <div class="td-content">
                                    @if($order->status==0)
                                        <span
                                            class="badge outline-badge-pending">@lang("website.pending")</span>
                                    @elseif($order->status==1)
                                        <span
                                            class="badge outline-badge-paid">@lang("website.paid")</span>
                                    @elseif($order->status==2)
                                        <span
                                            class="badge outline-badge-primary">@lang("website.confirmed")</span>
                                    @elseif($order->status==3)
                                        <span
                                            class="badge outline-badge-warning">@lang("website.sent")</span>
                                    @elseif($order->status==4)
                                        <span
                                            class="badge outline-badge-info">@lang("website.shipped")</span>
                                    @elseif($order->status==5)
                                        <span
                                            class="badge outline-outline-badge-info">@lang("website.rejected")</span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

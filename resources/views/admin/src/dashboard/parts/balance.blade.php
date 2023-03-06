<div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-account-invoice-one p-15">
        <div class="widget-heading">
            <h5 class="">@lang("website.account_info")</h5>
        </div>
        <div class="widget-content">
            <div class="invoice-box">
                <div class="acc-total-info">
                    <h5>@lang("website.balance")</h5>
                    <p class="acc-amount">{{\App\Library\DashboardHelper::ordersData()['balance']}}{!! $conf->currency !!}</p>
                </div>

                <div class="inv-detail">
                    <div class="info-detail-2">
                        <p>@lang("website.taxes")</p>
                        <p>{{\App\Library\DashboardHelper::ordersData()['tax']}}{!! $conf->currency !!}</p>
                    </div>
                    <div class="details info-detail-2 dashboard-orders-total">
                        <p>@lang("website.total")</p>
                        <p>{{\App\Library\DashboardHelper::ordersData()['revenue']}}{!! $conf->currency !!}</p>
                    </div>
                </div>
                <div class="inv-action">
                                                <span class="btn btn-dark"
                                                      onclick="$('.details').slideToggle(function(){$('#more').html($('.details').is(':visible')?'Summary':'Summary');});">@lang("website.summary")</span>
                </div>
            </div>
        </div>
    </div>
    <div class="widget-one dashboard-total-price-dark-section">
        <div class="widget-content">
            <div class="w-numeric-value">
                <div class="w-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-shopping-cart">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path
                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                </div>

                <div class="w-content">
                                                <span
                                                    class="w-value">{{\App\Library\DashboardHelper::ordersData()['totalNumberOrders']}}</span>
                    <span class="w-numeric-title">@lang("website.total_orders")</span>
                </div>
            </div>

        </div>
    </div>
</div>

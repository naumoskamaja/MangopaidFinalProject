<aside class="sidebar-currency-modal style-{{$conf->template}}-background">
    <div class="sidebar-currency-inner">
        <div class="sidebar-currency-content">
            <a class="currency-close close-button-size style-{{$conf->template}}-color"  href="javascript:void(0);"><i class="lastudioicon-e-remove"></i></a>
            <div class="sidebar-currency">
                <div class="product-currency">
                    <?php $currencies = \App\Library\ConstHelper::currencies; ?>
                    @foreach($currencies as $currency)
                        <div class="product-currency-item">
                            <div class="product-info">
                                <h4 class="title">
                                    <a href="/change/currency/{{$currency}}" class="style-{{$conf->template}}-color">
                                        {{$currency}}
                                    </a>
                                </h4>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</aside>
<div class="sidebar-currency-overlay"></div>

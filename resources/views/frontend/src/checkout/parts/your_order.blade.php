<h4 class="title">@lang('website.your-order')</h4>
<div class="order-review-details" style="position: relative">
    <div class="loaderContainer" v-if="loading">
        <div class="loader"></div>
    </div>

    <?php
    $subtotal = 0;
    $oldSubtotal = 0;
    $totalDiscount = 0;
    $prodDiscount = 0;
    ?>
    @if(session('cart'))
        <table class="table checkout-table" style="table-layout: fixed;">

            <thead>
            <tr>
                <th>@lang('website.product')</th>
                <th></th>
                <th class="right">@lang('website.total')</th>
            </tr>
            </thead>
            <tbody>
            @foreach(session('cart') as $id => $details)
                <tr>
                    <td>
                        <img src="{{ $details['image'] }}"
                             style="width: 100px;
                                 height: 100px;
                                 padding: 10px;
                                 object-fit: contain;" alt="img">
                    </td>
                    <td>
                        <span class="product-title">{{$details['title']}}</span>
                        <span class="product-quantity"> × {{$details['quantity']}}</span>
                        @if($details['size']!=null)
                            <p class="product-size"> @lang('website.size'): {{$details['size']}}</p>
                        @endif

                    </td>
                    <td class="right">
                        @if(\App\Library\ProductsHelper::get_product_price($details['p_id'])['discount']!=0)
                            <span
                                style="text-decoration:line-through">
                                {!! \App\Library\ConfigurationHelper::currency(\App\Library\ProductsHelper::get_product_price($details['p_id'])['oldPrice'] * $details['quantity']) !!} </span>
                        @endif
                        {!! \App\Library\ConfigurationHelper::currency(\App\Library\ProductsHelper::get_product_price($details['p_id'])['newPrice'] * $details['quantity']) !!}
                    </td>
                </tr>
            @endforeach

            </tbody>
            <tfoot>

            <tr class="cart-subtotal">
                <th>@lang('website.subtotal')</th>
                <td colspan="2" class="right w-30">
                    @if(\App\Library\ProductsHelper::get_cart_totals(session('cart'))['discount']!=0)
                        <span
                            style="text-decoration:line-through">
                        {!! \App\Library\ConfigurationHelper::currency(\App\Library\ProductsHelper::get_cart_totals(session('cart'))['old_subtotal']) !!} </span>
                    @else
                        {!! \App\Library\ConfigurationHelper::currency(\App\Library\ProductsHelper::get_cart_totals(session('cart'))['subtotal']) !!}
                    @endif
                </td>
            </tr>

            <tr class="cart-subtotal">
                <th>@lang('website.discount')</th>
                <td colspan="2" class="right">
                    {!! (session('calc') && isset(session('calc')['discount']) && session('calc')['discount']!=null) ?
                                \App\Library\ConfigurationHelper::currency(session('calc')['discount'])
                                : \App\Library\ConfigurationHelper::currency(\App\Library\ProductsHelper::get_cart_totals(session('cart'))['discount']) !!} </td>
            </tr>
            <tr class="cart-subtotal">
                <th>@lang('website.shipping')</th>
                <td colspan="2" class="right">@{{ conf_shipping_price }}</td>
            </tr>
            <tr class="final-total" style="border-top: 1px solid #efefef;">
                <th class="total-amount">@lang('website.total_to_pay')</th>
                <td colspan="2" class="right"><span
                        class="total-amount">
                        @{{ totalIncludesShipping }}

                    </span>
                </td>
            </tr>
            <tr style="background: #d9e7ef;" v-if="conf_min_price!=0">
                <td colspan="3" style="font-size: 14px; font-weight: 600" v-if="total < conf_min_price">
                    <i class="fa fa-truck" style="font-size: 25px; padding-right: 10px;"></i> @lang('website.for-only')
                    @{{
                    conf_min_price - total }}{!! $conf->currency !!} @lang('website.you-get-free-delivery')
                </td>
                <td colspan="3" style="font-size: 14px; font-weight: 600" v-else>
                    <i class="fa fa-truck" style="font-size: 25px; padding-right: 10px;"></i>
                    @lang('website.you-get-free-delivery')
                </td>
            </tr>
            <tr style="display: none;" id="suggested-products-info">
                <td colspan="3" style="font-size: 14px; font-weight: 600">
                    <i class="fa fa-shopping-cart" style="font-size: 25px; padding-right: 10px;"></i>
                    @lang('website.choose-one-of-suggested-products-to-get-a-free-delivery-or')
                    <a href="/search">@lang('website.view-the-full-list-of-products')</a>
                </td>
            </tr>
            <tr v-if="suggestedProducts.length>0" v-for="(prodIndex, product) in suggestedProducts">
                <td>
                    <img v-if="product.images[0].image!=null" src="@{{(product.images[0].image)}}"
                         style="height: 100px; width: 100px; object-fit: contain;"/>
                    <img v-else src="/assets/noimg.png" style="height: 100px; width: 100px; object-fit: contain;"/>
                </td>
                <td style="font-size: 13px;">@{{ product.name['en'] }}
                    <small>@{{ product.price }} €</small>

                </td>
                <td><p><a class="btn btn-xs btn-theme-dark"
                          style="padding: 3px !important; line-height: 0px !important;"
                          :href="'/show/'+product.id"><i class="fa fa-eye"></i> </a></p></td>

            </tr>
            </tfoot>
        </table>

        <p style="font-size: 14px;" v-if="conf_working_days!=''">@lang('website.delivery-transport'): @{{ user.country
            }}
            @{{ conf_working_days }} @lang('website.working-days').</p>
        <a href="{!! url('/back_to_shopping') !!}" class="btn place-order-btn"
           data-value="Go Back">
            @lang("website.go_back_to_shopping")
        </a>
    @endif
    <div class="shop-payment-method">
        <div id="accordion">
            <input type="hidden" name="payment" value="" id="paymentmethod" required/>
            @include('frontend.src.checkout.payment-methods.pod')
            @include('frontend.src.checkout.payment-methods.bank-transfer')
{{--            @include('frontend.src.checkout.payment-methods.paypal')--}}
            @include('frontend.src.checkout.payment-methods.stripe')
        </div>
    </div>
</div>
<p class="shop-checkout-info"> @lang('website.checkout-description').</p>

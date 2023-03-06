<section class="product-area cart-page-area p-b-80">
    <div class="container">
        <div class="d-none d-sm-block ">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shipping-info">
                        <div class="loading-bar">
                            <div class="load-percent"></div>
                            <div class="label-free-shipping">
                                <div class="free-shipping svg-icon-style">
                                <span class="svg-icon" id="svg-icon-shipping2"
                                      data-svg-icon="assets/front/img/icons/shop1.svg"></span>
                                </div>
                                <p>@lang('website.few-more-steps')</p>
                            </div>
                        </div>
                    </div>
                    <div class="cart-table-wrap">
                        @if(!session('cart'))
                            <div class="additional_info_order empty-cart-div">
                              <span class="p-t-20">
                                  <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                  @lang("website.your_cart_is_currently_empty").
                              </span>
                            </div>
                        @else
                            <div class="cart-table table-responsive">
                                <table>
                                    <thead>
                                    <tr>
                                        <th class="pro-remove p-l-r-10"></th>
                                        <th class="pro-thumbnail p-l-r-10"></th>
                                        <th class="pro-name p-l-r-10 p-l-10">@lang('website.product')</th>
                                        <th class="pro-size p-l-r-10">@lang('website.size')</th>
                                        <th class="pro-size p-l-r-10">@lang('website.availability')</th>
                                        <th class="pro-price p-l-r-10">@lang('website.price')</th>
                                        <th class="pro-quantity p-l-r-10">@lang('website.quantity')</th>
                                        <th class="pro-subtotal p-l-r-10">@lang('website.subtotal')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(session('cart') as $id => $details)
                                        <?php $product = \App\Library\ProductsHelper::get_cart_product($details) ?>
                                        <tr>
                                            <td class="pro-remove p-l-r-10">
                                                <form action="/cart/delete/{{$id}}" method="post">
                                                    @csrf
                                                    <button type="submit"
                                                            class="remove remove-btn remove-from-cart remove-cart"
                                                            data-id="{{ $id }}"
                                                            title="Remove this item"><i
                                                            class="lastudioicon-e-remove"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="pro-thumbnail p-l-r-10">
                                                <div class="pro-info">
                                                    <div class="pro-img">
                                                        <a href="/show/{{$details['p_id']}}">
                                                            <img src="{{ $details['image'] }}"
                                                                 alt="img">
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="pro-name p-l-r-10 p-l-10">
                                            <span>
                                                {{substr($details['title'],0,30)}}
                                            </span></td>

                                            <td class="pro-size p-l-r-10">@if($details['size']!="")
                                                    <span>{{$details['size']}}</span> @else - @endif</td>
                                            <td>
                                                 <span id="out-of-stock"
                                                    class="{!! \App\Library\ProductsHelper::get_stock_colored_message($product->id, $details['size'])['color'] !!} font-size-12">@lang('website.'.\App\Library\ProductsHelper::get_stock_colored_message($product->id, $details['size'])['product_status'])</span>
                                            </td>
                                            <td class="pro-price p-l-r-10">
                                            <span>

                                                @if(\App\Library\ProductsHelper::get_product_price($product->id)['discount']!=0)
                                                    <span
                                                        style="text-decoration:line-through">{{\App\Library\ConfigurationHelper::currency(\App\Library\ProductsHelper::get_product_price($product->id)['oldPrice'])}}</span>
                                                @endif
                                                    {{\App\Library\ConfigurationHelper::currency(\App\Library\ProductsHelper::get_product_price($product->id)['newPrice'])}}

                                            </span>
                                            </td>
                                            <td class="pro-quantity p-l-r-10">
                                                {{$details['quantity']}}
                                            </td>
                                            <td class="pro-subtotal p-l-r-10">
                                            <span>
                                                @if(App\Library\ProductsHelper::get_product_price($product->id)['discount']!=0)
                                                    <span
                                                        style="text-decoration:line-through">{{\App\Library\ConfigurationHelper::currency(App\Library\ProductsHelper::get_product_price($product->id)['oldPrice'] * $details['quantity'])}}</span>
                                                @endif
                                                    {{\App\Library\ConfigurationHelper::currency(App\Library\ProductsHelper::get_product_price($product->id)['newPrice'] * $details['quantity'])}}
                                            </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart-payment">
                        <div class="cart-subtotal">
                            <table>
                                <tbody>
                                <tr>
                                    <th>@lang('website.subtotal')</th>
                                    <td>
                                    <span class="amount">
                                        @if(\App\Library\ProductsHelper::get_cart_totals(session('cart'))['discount']!=0)
                                            <span
                                                style="text-decoration:line-through">{{\App\Library\ConfigurationHelper::currency(\App\Library\ProductsHelper::get_cart_totals(session('cart'))['old_subtotal'])}}</span>
                                        @endif
                                            {{\App\Library\ConfigurationHelper::currency(\App\Library\ProductsHelper::get_cart_totals(session('cart'))['subtotal'])}}
                                    </span>
                                    </td>
                                </tr>
                                <tr class="shipping-totals">
                                    <th>@lang('website.shipping')</th>
                                    <td>
                                        <p>@lang('website.shipping-options-will-be-updated-during-checkout')</p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <a class="btn-theme" href="/checkout">@lang('website.proceed-to-checkout')</a>
                        <a class="btn-theme-light" style="text-transform: uppercase !important;"
                           href="{!! url('/back_to_shopping') !!}">@lang('website.back-to-shopping')</a>
                    </div>
                </div>
            </div>
        </div>


        {{--        on mobile--}}
        <div class="d-block d-sm-none">
            <aside class="sidebar-cart-modal-row row">
                <div class="sidebar-cart-inner">
                    <div class="sidebar-cart-content">
                        <div class="sidebar-cart">
                            <h4 class="sidebar-cart-title"
                                style="font-size: 16px; padding-bottom: 40px;">@lang('website.shopping-cart')</h4>

                            @if(!session('cart'))
                                <div class="additional_info_order empty-cart-description">
                                    <span class="p-t-20"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>  @lang("website.your_cart_is_currently_empty"). </span>
                                </div>
                            @else
                                <div class="product-cart">
                                    @foreach(session('cart') as $id => $details)
                                        <div class="product-cart-item" style="display: flex;
                                                                        margin-top: 10px;
                                                                        margin-bottom: 30px;">
                                            <div class="product-img">
                                                <a href="/show/{{$details['p_id']}}">
                                                        <img src="{{ $details['image'] }}"
                                                             style="height: 100px;
                                                                object-fit: contain;
                                                                padding: 5px; width: 100px;"
                                                             alt="img" >
                                                </a>
                                            </div>
                                            <div style="display: flex; justify-content: space-between; width: 100%">
                                                <div class="product-info">
                                                    <h4 class="title">
                                                        <a href="/shop" style="    font-size: 12px;">{{substr($details['title'],0,40)}}..</a>
                                                    </h4>
                                                    <p style="font-size: 12px;margin-bottom:0">
                                                        <span id="out-of-stock"
                                                              class="{!! \App\Library\ProductsHelper::get_stock_colored_message($product->id, $details['size'])['color'] !!} font-size-12">@lang('website.'.\App\Library\ProductsHelper::get_stock_colored_message($product->id, $details['size'])['product_status'])</span>
                                                    </p>

                                                    <span
                                                        class="info">{{ $details['quantity'] }} × @if(\App\Library\ProductsHelper::get_product_price($product->id)['discount']!=0)
                                                            <span
                                                                style="text-decoration:line-through">{!! \App\Library\ConfigurationHelper::currency(\App\Library\ProductsHelper::get_product_price($product->id)['oldPrice']) !!}</span> @endif
                                                        {!! \App\Library\ConfigurationHelper::currency(\App\Library\ProductsHelper::get_product_price($product->id)['newPrice']) !!}
                                    </span>
                                                    @if($details['size'])<p
                                                        class="info color-info">@lang('website.size')
                                                        : {{ $details['size'] }} </p> @endif

                                                </div>
                                                <div class="product-delete">
                                                    <form action="/cart/delete/{{$id}}" method="post">
                                                        @csrf
                                                        <button type="submit"
                                                                class="remove remove-btn remove-from-cart remove-cart-btn"
                                                                data-id="{{ $id }}"
                                                                title="Remove this item">
                                                            ×
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            @if(\App\Library\ProductsHelper::get_cart_totals(session('cart'))['discount']!=0)
                                <div class="cart-total uppercase" style="padding: 20px 20px 10px;">
                                    <h4 class="font-14">@lang('website.promotional-savings'):
                                        <span class="money font-14">
                                {!! \App\Library\ConfigurationHelper::currency(\App\Library\ProductsHelper::get_cart_totals(session('cart'))['discount']) !!}
                            </span>
                                    </h4>
                                </div>
                            @endif
                            @if(\App\Library\ProductsHelper::get_cart_totals(session('cart'))['subtotal']!=0)
                                <div class="cart-total uppercase" style="padding: 10px 20px 20px;">
                                    <h4>@lang('website.total'):
                                        <span class="money">
                                {!! \App\Library\ConfigurationHelper::currency(\App\Library\ProductsHelper::get_cart_totals(session('cart'))['subtotal']) !!}
                            </span>
                                    </h4>
                                </div>
                                <div class="cart-checkout-btn">
                                    <a class="btn-theme" href="/checkout" style="width: 100%;
                                    margin-bottom: 5px; text-align: center;">@lang('website.checkout')</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="cart-checkout-btn">
                    <a class="btn-theme-light"
                       href="{!! url('/back_to_shopping') !!}">@lang('website.back-to-shopping')</a>
                </div>
            </aside>
        </div>
    </div>
</section>

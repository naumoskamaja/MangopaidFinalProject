<aside class="sidebar-cart-modal style-{{$conf->template}}-background">
    <div class="sidebar-cart-inner">
        <div class="sidebar-cart-content">
            <a class="cart-close close-button-size style-{{$conf->template}}-color" href="javascript:void(0);"><i class="lastudioicon-e-remove" ></i></a>
            <div class="sidebar-cart">
                <h4 class="sidebar-cart-title style-{{$conf->template}}-color">@lang('website.shopping-cart')</h4>
                @if(!session('cart'))
                    <div class="additional_info_order empty-cart-description">
                        <span class="p-t-20"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>  @lang("website.your_cart_is_currently_empty"). </span>
                    </div>
                @else
                    <div class="product-cart">
                        @foreach(session('cart') as $id => $details)
                            <?php $product = \App\Library\ProductsHelper::get_cart_product($details) ?>
                            <div class="product-cart-item">
                                <div class="product-img">
                                    <a href="/show/{{$details['p_id']}}">
                                        <img src="{{asset($details['image']) }}"
                                             alt="img">
                                    </a>
                                </div>
                                <div class="product-info">
                                    <h4 class="title style-{{$conf->template}}-color"><a href="/show/{{$details['p_id']}}" class="style-{{$conf->template}}-color">{{substr($details['title'],0,40)}}..</a>
                                    </h4>
                                    <p style="font-size: 12px;margin-bottom:0">
                                        <span id="out-of-stock"
                                              class="{!! \App\Library\ProductsHelper::get_stock_colored_message($product->id, $details['size'])['color'] !!} font-size-12">@lang('website.'.\App\Library\ProductsHelper::get_stock_colored_message($product->id, $details['size'])['product_status'])</span>
                                    </p>
                                    <span
                                        class="info style-{{$conf->template}}-color">
                                        {{ $details['quantity'] }} × @if(\App\Library\ProductsHelper::get_product_price($product->id)['discount']!=0)
                                            <span class="style-{{$conf->template}}-color"
                                                style="text-decoration:line-through">{!! \App\Library\ConfigurationHelper::currency(\App\Library\ProductsHelper::get_product_price($product->id)['oldPrice']) !!}</span> @endif
                                        {!! \App\Library\ConfigurationHelper::currency(\App\Library\ProductsHelper::get_product_price($product->id)['newPrice']) !!}
                                    </span>
                                    @if($details['size'])<p class="info color-info style-{{$conf->template}}-color">@lang('website.size')
                                        : {{ $details['size'] }} </p> @endif

                                </div>
                                <div class="product-delete">
                                    <form action="/cart/delete/{{$id}}" method="post">
                                        @csrf
                                        <button type="submit"
                                                class="remove remove-btn remove-from-cart remove-cart-btn style-{{$conf->template}}-color"
                                                data-id="{{ $id }}"
                                                title="Remove this item">
                                            ×
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
                @if(\App\Library\ProductsHelper::get_cart_totals(session('cart'))['discount']!=0)
                    <div class="cart-total uppercase">
                        <h4 class="font-14 style-{{$conf->template}}-color">@lang('website.promotional-savings'):
                            <span class="money font-14 style-{{$conf->template}}-color">
                                {!! \App\Library\ConfigurationHelper::currency(\App\Library\ProductsHelper::get_cart_totals(session('cart'))['discount']) !!}
                            </span>
                        </h4>
                    </div>
                @endif
                @if(\App\Library\ProductsHelper::get_cart_totals(session('cart'))['subtotal']!=0)
                    <div class="cart-total uppercase">
                        <h4 class="style-{{$conf->template}}-color">@lang('website.total'):
                            <span class="money style-{{$conf->template}}-color">
                                {!! \App\Library\ConfigurationHelper::currency(\App\Library\ProductsHelper::get_cart_totals(session('cart'))['subtotal']) !!}
                            </span>
                        </h4>
                    </div>
                    <div class="cart-checkout-btn">
                        <a class="btn-theme btn-style-{{$conf->template}}" href="/cart">@lang('website.view-cart')</a>
                        <a class="btn-theme btn-style-{{$conf->template}}" href="/checkout">@lang('website.checkout')</a>
                        <a class="btn-theme-light btn-style-{{$conf->template}}-reverse"
                           href="{!! url('/back_to_shopping') !!}">@lang('website.back-to-shopping')</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</aside>

<div class="sidebar-cart-overlay"></div>

<div class="product-area wishlist-page-area">
    <div class="container">
        <div class="d-none d-sm-block">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wishlist-table-wrap">
                        @if(!session('wishlist'))
                            <div class="additional_info_order empty-cart-description">
                  <span class="p-t-20">
                      <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                      @lang("website.your_wishlist_is_currently_empty").
                  </span>
                            </div>
                        @else
                            <div class="wishlist-table table-responsive">
                                <table>
                                    <thead>
                                    <tr>
                                        <th class="pro-remove"></th>
                                        <th class="pro-thumbnail"></th>
                                        <th class="pro-name">@lang('website.product')</th>
                                        <th class="pro-price">@lang('website.price')</th>
                                        <th class="pro-action"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(session('wishlist') as $id => $details)
                                        <tr>
                                            <td class="pro-remove">
                                                <form action="/wishlist/delete/{{$id}}" method="post">
                                                    @csrf
                                                    <button type="submit"
                                                            class="remove remove_from_wishlist remove-from-wish remove-button remove-cart-btn"
                                                            data-id="{{ $id }}"
                                                            title="Remove this product"><i
                                                            class="lastudioicon-e-remove"></i></button>
                                                </form>
                                            </td>
                                            <td class="pro-thumbnail">
                                                <div class="pro-info">
                                                    <div class="pro-img">
                                                        <a href="/shop-product">
                                                            @if($details['image']!=null)
                                                                <img src="/assets/loader.gif"
                                                                     data-src="{{ $details['image'] }}"
                                                                     class="lazy" alt="img">
                                                            @else
                                                                <img src="/assets/noimg.png"
                                                                     class="lazy" alt="img">
                                                            @endif
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="pro-name"><span>{{ $details['title'] }}</span></td>
                                            <td class="pro-price">
                                                {!! \App\Library\ConfigurationHelper::currency(\App\Library\ProductsHelper::get_product_price( $details['p_id'])['newPrice'] ) !!}
                                            </td>
                                            <td class="pro-action"><a class="btn-theme btn-black"
                                                                      href="/show/{{$id}}">@lang("website.quick_view")</a>
                                                <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#product-modal-wishlist-{{$details['p_id']}}"
                                                        class="add-to-cart-modal-btn">
                                                    <i class="lastudioicon-shopping-cart-1"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="d-block d-sm-none">
            <aside class="sidebar-cart-modal-row row">
                <div class="sidebar-cart-inner">
                    <div class="sidebar-cart-content">
                        <div class="sidebar-cart">
                            <h4 class="sidebar-cart-title"
                                style="font-size: 16px; padding-bottom: 40px;">@lang('website.wishlist')</h4>
                            @if(!session('wishlist'))
                                <div class="additional_info_order empty-cart-description">
                                    <span class="p-t-20"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>  @lang("website.your_cart_is_currently_empty"). </span>
                                </div>
                            @else
                                <div class="product-cart">
                                    @foreach(session('wishlist') as $id => $details)
                                        <div class="product-cart-item" style="display: flex;
                                                                        margin-top: 10px;
                                                                        margin-bottom: 30px;">
                                            <div class="product-img">
                                                <a href="/show/{{$details['p_id']}}">
                                                    <img
                                                        src="{{\App\Library\ProductsHelper::get_image($details['image'])}}"
                                                        alt="img" style="height: 100px;
                                                                object-fit: contain;
                                                                padding: 5px; width: 100px;">

                                                </a>
                                            </div>
                                            <div
                                                style="display: flex; justify-content: space-between; width: 100%; padding-left: 10px !important;">
                                                <div class="product-info">
                                                    <h4 class="title"><a href="/shop"
                                                                         style="    font-size: 12px;">
                                                            {{substr($details['title'],0,40)}}
                                                            ..</a>
                                                    </h4>

                                                    <span
                                                        class="info">
                                                        @if(\App\Library\ProductsHelper::get_product_price($details['p_id'])['product_has_action'])
                                                            <span
                                                                style="text-decoration:line-through">{!! \App\Library\ConfigurationHelper::currency(\App\Library\ProductsHelper::get_product_price($details['p_id'])['oldPrice']) !!}</span> @endif
                                                        {!! \App\Library\ConfigurationHelper::currency(\App\Library\ProductsHelper::get_product_price($details['p_id'])['newPrice']) !!}
                                    </span>
                                                    <p style="margin-bottom:0;"><a style="font-size: 11px;
                                                          text-decoration: underline;"
                                                                                   href="/show/{{$details['p_id']}}">@lang('website.view-more')</a>
                                                        | <a style="font-size: 11px; text-decoration: underline;"
                                                             type="button" data-bs-toggle="modal"
                                                             data-bs-target="#product-modal-wishlist-{{$details['p_id']}}"
                                                        >@lang('website.add-to-cart')</a></p>

                                                </div>
                                                <div class="product-delete">
                                                    <form action="/wishlist/delete/{{$id}}" method="post">
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
                        </div>
                    </div>
                </div>
                <div class="cart-checkout-btn">
                    <a class="btn-theme-light"
                       href="{{ url('/back_to_shopping') }}">@lang('website.back-to-shopping')</a>
                </div>
            </aside>

        </div>

    </div>
</div>
@if(session('wishlist'))
    @foreach(session('wishlist') as $id => $details)
        @include('frontend.layout.modals.quick-view-wishlist')
    @endforeach
@endif

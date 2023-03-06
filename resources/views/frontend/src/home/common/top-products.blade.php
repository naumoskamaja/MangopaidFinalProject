<section class="product-area new-product-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-6 m-auto">
                <div class="section-title text-center" data-aos="fade-up" data-aos-duration="1000">
                    <h2 class="title">@lang('website.latest-products')</h2>
                    <h5 class="subtitle">@lang('website.view_collection')</h5>
                </div>
            </div>
        </div>
        <div class="row row-gutter-60" data-aos="fade-up" data-aos-duration="1000">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($top_products as $product)
                        <div class="swiper-slide">
                            <!-- Start Product Item -->
                            <div class="product-item">
                                <div class="product-thumb">
                                    <a href="/show/{{ $product->id}}">
                                        <img src="{{\App\Library\ProductsHelper::get_product_image($product)}}"
                                             alt="Product"/>
                                        <span class="thumb-overlay"></span>
                                    </a>
                                    <div class="product-action action-style3">
                                        <a class="action-quick-view"
                                           href="{{ url('show/'.$product->id) }}">
                                            <i class="lastudioicon-search-zoom-in"></i>
                                        </a>
                                        <a class="action-quick-view" type="button" data-bs-toggle="modal"
                                           data-bs-target="#product-modal-{{$product->id}}">
                                            <i class="lastudioicon-shopping-cart-2"></i>
                                        </a>

                                        <a class="action-wishlist" href="{{ url('add-to-wishlist/'.$product->id) }}">
                                            <i class="lastudioicon-heart-2"
                                               @if(\App\Library\ProductsHelper::checkIfProductInWishlist($product))
                                               style="color: red"
                                                @endif></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-info info-style3">
                                    <div class="content-inner">
                                        <h4 class="title"><a
                                                href="/show/{{$product->id}}">
                                                {{\App\Library\LibHelper::echoJson($product->name,__('website.lang'))}}
                                            </a>
                                        </h4>
                                        <div class="prices">
                                            @if(\App\Library\ProductsHelper::get_product_price($product->id)['product_has_action'])
                                                <span style="text-decoration:line-through" class="price text-black">
                                                    {!! \App\Library\ConfigurationHelper::currency(\App\Library\ProductsHelper::get_product_price($product->id)['oldPrice']) !!}
                                                </span>
                                                <span class="price action-price p-l-10">
                                                                {!! \App\Library\ConfigurationHelper::currency(\App\Library\ProductsHelper::get_product_price($product->id)['newPrice'] ) !!}
                                                            <span class="action-price" style="font-weight: 300">({!! \App\Library\ProductsHelper::get_product_price($product->id)['discount_percent'] !!}%)</span>
                                                </span>
                                            @else
                                                <span class="price">
                                                                {!! \App\Library\ConfigurationHelper::currency($product->price ) !!}
                                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Product Item -->
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-12 text-center">
                <a href="/search"
                   class="btn-theme btn-black btn-border btn-padding mt-20">@lang('website.view_more')</a>
            </div>
        </div>
    </div>
</section>
@foreach ($top_products as $product)
    @include('frontend.layout.modals.quick-view')
@endforeach

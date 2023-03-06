<section class="product-area related-products-area related">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="section-title text-center">
                    <h2 class="title">@lang("website.related_products")</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="swiper-container product4-slider-container" style="padding: 0 10px;">
                    @if(count($related_products) > 0)
                        <div class="swiper-wrapper">
                            @foreach ($related_products as $related_product)
                                <div class="swiper-slide">
                                    <!-- Start Product Item -->
                                    <div class="product-item">
                                        <div class="product-thumb">
                                            <a href="/show/{{ $related_product->id}}">
                                                <img
                                                    src="{{\App\Library\ProductsHelper::get_product_image($related_product)}}"
                                                    alt="Product">
                                                <span class="thumb-overlay"></span>
                                            </a>
                                            <div class="product-action action-style3">
                                                <a class="action-quick-view"
                                                   href="{{ url('show/'.$related_product->id) }}">
                                                    <i class="lastudioicon-search-zoom-in"></i>
                                                </a>
                                                <a class="action-quick-view" type="button" data-bs-toggle="modal"
                                                   data-bs-target="#product-modal-{{$related_product->id}}">
                                                    <i class="lastudioicon-shopping-cart-2"></i>
                                                </a>

                                                <a class="action-wishlist"
                                                   href="{{ url('add-to-wishlist/'.$related_product->id) }}">
                                                    <i class="lastudioicon-heart-2"
                                                       @if(\App\Library\ProductsHelper::checkIfProductInWishlist($related_product))
                                                       style="color: red" @endif
                                                    ></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info info-style3">
                                            <div class="content-inner">
                                                <h4 class="title"><a
                                                        href="/show/{{$related_product->id}}">
                                                        {{\App\Library\LibHelper::echoJson($related_product->name,__('website.lang') ?? 'en')}}
                                                    </a>
                                                </h4>
                                                <div class="prices">
                                                    @if(\App\Library\ProductsHelper::get_product_price($related_product->id)['product_has_action'])
                                                        <span style="text-decoration:line-through"
                                                              class="price text-black">
                                                            {!! \App\Library\ConfigurationHelper::currency(\App\Library\ProductsHelper::get_product_price($related_product->id)['oldPrice']) !!}
                                                        </span>
                                                        <span class="price action-price p-l-10">
                                                                {!! \App\Library\ConfigurationHelper::currency(\App\Library\ProductsHelper::get_product_price($related_product->id)['newPrice']) !!}
                                                            </span>
                                                        <span class="action-price" style="font-weight: 300">({!! \App\Library\ProductsHelper::get_product_price($related_product->id)['discount_percent'] !!}%)</span>

                                                    @else
                                                        <span class="price">
                                                                {!! \App\Library\ConfigurationHelper::currency($related_product->price ) !!}
                                                            </span>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="swiper-wrapper">
                            <p class="alert coco-alert text-center w-100">@lang("website.there_are_no_related_products")</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@foreach ($related_products as $product)
    @include('frontend.layout.modals.quick-view')
@endforeach

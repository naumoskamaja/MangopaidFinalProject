{{--<section class="product-area best-sellers-product-area">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-8 col-lg-6 m-auto">--}}
{{--                <div class="section-title text-center" data-aos="fade-up" data-aos-duration="1000">--}}
{{--                    <h2 class="title">@lang('website.bestsellers')</h2>--}}
{{--                    <h5 class="subtitle">@lang('website.new-collection')</h5>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row row-gutter-60" data-aos="fade-up" data-aos-duration="1000">--}}
{{--            @foreach($bestsellers as $product)--}}
{{--                <div class="col-sm-6 col-lg-4">--}}
{{--                    <!-- Start Product Item -->--}}
{{--                    <div class="product-item">--}}
{{--                        <div class="product-thumb">--}}
{{--                            <a href="/show/{{$product->id}}">--}}
{{--                                @if(isset($product->images[0]) && $product->images[0]->image!=null)--}}
{{--                                    <img src="{{asset($product->images[0]->image)}}"--}}
{{--                                         alt="Product">--}}
{{--                                @else--}}
{{--                                    <img src="/assets/noimg.png" alt="Product">--}}
{{--                                @endif--}}
{{--                                @if(isset($product->images[0]) && $product->images[1]->image!=null)--}}
{{--                                    <span class="bg-thumb" data-bg-img="{{asset($product->images[1]->image)}}"></span>--}}
{{--                                @endif--}}
{{--                                <span class="thumb-overlay"></span>--}}
{{--                            </a>--}}
{{--                            <div class="product-action">--}}
{{--                                <a class="action-quick-view ht-tooltip" data-tippy-content="@lang('website.quick-view')"--}}
{{--                                   href="/show/{{$product->id}}" title="@lang('website.quick-view')">--}}
{{--                                    <i class="lastudioicon-search-zoom-in"></i>--}}
{{--                                </a>--}}
{{--                                <a class="action-compare ht-tooltip" data-tippy-content="Add to wishlist"--}}
{{--                                   href="shop-compare.html" title="@lang('website.add-to-wishlist')">--}}
{{--                                    <i class="lastudioicon-heart-2" @if(session('wishlist')!=null)--}}
{{--                                    @foreach(session('wishlist') as $id => $details)--}}
{{--                                    @if($details['p_id'] == $product->id)--}}
{{--                                    style="color: red"--}}
{{--                                        @endif--}}
{{--                                        @endforeach--}}
{{--                                        @endif></i>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-info">--}}
{{--                            <div class="content-inner">--}}
{{--                                <h4 class="title"><a href="/show/{{$product->id}}">--}}
{{--                                        {{\App\Library\LibHelper::echoJson($product->name,__('website.lang'))}}--}}
{{--                                    </a></h4>--}}
{{--                                <div class="prices">--}}
{{--                                    @if($product->hasAction)--}}
{{--                                        <span style="text-decoration:line-through" class="price text-black">--}}
{{--                                            {!! \App\Library\ConfigurationHelper::currency($product->price ) !!}--}}
{{--                                        </span>--}}
{{--                                        <span class="price action-price p-l-10">--}}
{{--                                            {!! \App\Library\ConfigurationHelper::currency($product->hasAction->new_price ) !!}--}}
{{--                                        </span>--}}
{{--                                    @elseif($catAction!=null)--}}
{{--                                        <span style="text-decoration:line-through" class="price text-black">--}}
{{--                                            {!! \App\Library\ConfigurationHelper::currency($product->price ) !!}--}}
{{--                                        </span>--}}
{{--                                        <span class="price action-price p-l-10">--}}
{{--                                            {!! \App\Library\ConfigurationHelper::currency(\App\Library\ConfigurationHelper::discount($product->price, $catAction->discount )) !!}--}}
{{--                                        </span>--}}
{{--                                        <span class="action-price" style="font-weight: 300">({!! (int) $catAction->discount !!}%)</span>--}}
{{--                                    @else--}}
{{--                                        <span class="price">--}}
{{--                                            {!! \App\Library\ConfigurationHelper::currency($product->price ) !!}--}}
{{--                                        </span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="product-info-action">--}}
{{--                                <a class="action-cart ht-tooltip" data-tippy-content="Add to cart"--}}
{{--                                   type="button"--}}
{{--                                   data-bs-toggle="modal"--}}
{{--                                   data-bs-target="#product-modal-{{$product->id}}"--}}
{{--                                   title="Add to cart">--}}
{{--                                    <i class="lastudioicon-bag-3"></i>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- End Product Item -->--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}


<section class="product-area new-product-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-6 m-auto">
                <div class="section-title text-center" data-aos="fade-up" data-aos-duration="1000">
                    <h2 class="title">New Products</h2>
                    <h5 class="subtitle">COLLECTION 2021</h5>
                </div>
            </div>
        </div>
        <div class="row row-gutter-60" data-aos="fade-up" data-aos-duration="1000">
            @foreach($top_products as $product)
            <div class="col-sm-6 col-lg-4">
                <!-- Start Product Item -->
                <div class="product-item">
                    <div class="product-thumb">
                        <a href="/show/{{ $product->id}}">
                            <img src="{{\App\Library\ProductsHelper::get_product_image($product)}}"
                                 alt="Product"/>
                            <span class="thumb-overlay"></span>
                        </a>
                        <div class="product-action">
                            <a class="action-quick-view ht-tooltip" data-tippy-content="Quick View" href="{{ url('show/'.$product->id) }}" title="Quick View">
                                <i class="lastudioicon-search-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="content-inner">
                            <h4 class="title"><a href="{{ url('show/'.$product->id) }}">{{\App\Library\LibHelper::echoJson($product->name,__('website.lang'))}}</a></h4>
                            <div class="prices">
                                @if(\App\Library\ProductsHelper::get_product_price($product->id)['product_has_action'])
                                    <span style="text-decoration:line-through" class="price text-black">
                                                    {!! \App\Library\ConfigurationHelper::currency(\App\Library\ProductsHelper::get_product_price($product->id)['oldPrice']) !!}
                                                </span>
                                    <span class="price action-price p-l-10 style-4-second-color">
                                                                {!! \App\Library\ConfigurationHelper::currency(\App\Library\ProductsHelper::get_product_price($product->id)['newPrice'] ) !!}
                                                            <span class="action-price @if($conf->template == 4) style-4-second-color @endif" style="font-weight: 300">({!! \App\Library\ProductsHelper::get_product_price($product->id)['discount_percent'] !!}%)</span>
                                                </span>
                                @else
                                    <span class="price">
                                                                {!! \App\Library\ConfigurationHelper::currency($product->price ) !!}
                                                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="product-info-action">
                            <a class="action-wishlist ht-tooltip top-1" data-tippy-content="Add to wishlist" href="{{ url('add-to-wishlist/'.$product->id) }}" title="Add to wishlist" >
                                <i class="lastudioicon-heart-2 style-4-second-color" @if(\App\Library\ProductsHelper::checkIfProductInWishlist($product))
                                style="color: #b70404 !important;" @endif></i>
                            </a>
                            <a class="action-cart ht-tooltip" data-tippy-content="Add to cart"  type="button" data-bs-toggle="modal"
                               data-bs-target="#product-modal-{{$product->id}}">
                                <i class="lastudioicon-bag-3 @if($conf->template == 4) style-4-second-color @endif"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Product Item -->
            </div>
            @endforeach

            <div class="col-md-12 text-center">
                <a href="/search" class="btn-theme btn-black btn-border btn-padding mt-20">View more</a>
            </div>
        </div>
    </div>
</section>
@foreach ($top_products as $product)
    @include('frontend.layout.modals.quick-view')
@endforeach

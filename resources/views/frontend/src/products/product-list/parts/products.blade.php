<div class="col-lg-9 order-0 order-lg-1">
    <div class="inner-left-padding">
        @include('frontend.src.products.product-list.parts.toolbar')
        @if(count($products)>0)
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
                    <div class="row row-gutter-60 product-items-style4">
                        @foreach ($products as $product)
                            <div class="col-6 col-sm-6 col-md-4">
                                <!-- Start Product Item -->
                                <div class="product-item">
                                    <div class="product-thumb">
                                        <a href="/show/{{ $product->id}}">
                                            <img class="lazy" src="/assets/loader.gif"
                                                 data-src="{{\App\Library\ProductsHelper::get_product_image($product)}}"
                                                 alt="Product">
                                            <span class="thumb-overlay"></span>
                                        </a>
                                        <div class="product-action action-style3">
                                            <a href="{{ url('show/'.$product->id) }}">
                                                <i class="lastudioicon-search-zoom-in"></i>
                                            </a>
                                            <a class="action-wishlist "
                                               href="{{ url('add-to-wishlist/'.$product->id) }}">
                                                <i class="lastudioicon-heart-2"
                                                   @if(\App\Library\ProductsHelper::checkIfProductInWishlist($product))
                                                   style="color: red"
                                                    @endif
                                                ></i>
                                            </a>
                                            <a type="button" data-bs-toggle="modal"
                                               data-bs-target="#product-modal-{{$product->id}}"
                                               class=" action-wishlist">
                                                <i class="lastudioicon-shopping-cart-1"></i>
                                            </a>
                                        </div>
                                        @if(\App\Library\ProductsHelper::get_product_price($product->id)['product_has_action'])
                                            <div style="
                                            position: absolute;
                                            bottom: 0;
                                            text-align: center;
                                            width: 100%;
                                            background: #d8d8d8eb;
                                            font-size: 21px;
                                            color: #D71E25;
                                            font-weight: 500;">@lang('website.sale')
                                            </div>
                                        @endif
                                    </div>
                                    <div class="product-info info-style2">
                                        <div class="content-inner">
                                            <h4 class="title"><a href="/show/{{$product->id}}">
                                                    {{\App\Library\LibHelper::echoJson($product->name,__('website.lang'))}}
                                                </a></h4>
                                            <div class="prices">
                                                @if(\App\Library\ProductsHelper::get_product_price($product->id)['product_has_action'])
                                                    <del style="color:#747474;margin-right:5px;font-size: 14px;">
                                                        <span class="price" style="color:#747474">
                                                            {!! \App\Library\ConfigurationHelper::currency(\App\Library\ProductsHelper::get_product_price($product->id)['oldPrice']) !!}
                                                        </span>
                                                    </del>

                                                    <span class="price action-price">
                                                        {!! \App\Library\ConfigurationHelper::currency(\App\Library\ProductsHelper::get_product_price($product->id)['newPrice'] ) !!}
                                                    </span>
                                                    <span class="action-price" style="font-weight: 300">({!! \App\Library\ProductsHelper::get_product_price($product->id)['discount_percent'] !!}%)</span>
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
                            @include('frontend.layout.modals.quick-view')
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="justify-content-center pagination-section">
                <div class="row testRow">
                    <div class="col-12">
                        @include('pagination', ['paginator' => $products])
                    </div>
                </div>
            </div>
        @else
            <p class="alert coco-alert text-center">@lang("website.there_is_no_product_with_filtered_criteria").</p>
        @endif
    </div>
</div>



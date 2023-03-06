<section class="product-area shop-single-product" id="app2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="swiper-container gallery-slider ">
                    <div class="swiper-wrapper">
                        @forelse($product->images as $image)
                            <div class="swiper-slide">
                                <img src="{{asset($image->image)}}" style="max-height: 608px;" alt="image-product">
                            </div>
                        @empty
                            <div class="swiper-slide">
                                <img class="lazy" src="/assets/loader.gif" style="max-height: 608px;"
                                     data-src="/assets/noimg.png" alt="Image-auverture">
                            </div>
                        @endforelse
                    </div>
                    <div class="swiper-button-prev" style="color:#85828270"></div>
                    <div class="swiper-button-next" style="color:#85828270"></div>
                </div>

                <div class="swiper-container gallery-thumbs ">
                    <div class="swiper-wrapper">
                        @foreach($product->images as $image)
                            <div class="swiper-slide"><img src="{{asset($image->image)}}" alt="image-thumbnail"></div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="single-product-info">
                    <h4 class="title">
                        {{\App\Library\LibHelper::echoJson($product->name,__('website.lang'))}}
                    </h4>
                    <div class="product-rating">
                        @if(count($reviews)>0)
                            <?php $average = \App\Library\ProductsHelper::get_product_average_stars($reviews) ?>
                            <div class="ratting-icons">
                                <span>{{round($average, 1)}}</span>
                                <i class="@if($average>=1) lastudioicon-star-rate-1 @else lastudioicon-star-rate-2 @endif"></i>
                                <i class="@if($average <= 1.24)lastudioicon-star-rate-2 @elseif($average>=1.25 && $average <= 1.74)fa fa-star-half-full @else lastudioicon-star-rate-1 @endif"></i>
                                <i class="@if($average <= 2.24)lastudioicon-star-rate-2 @elseif($average>=2.25 && $average <= 2.74)fa fa-star-half-full @else lastudioicon-star-rate-1 @endif"></i>
                                <i class="@if($average <= 3.24)lastudioicon-star-rate-2 @elseif($average>=3.25 && $average <= 3.74)fa fa-star-half-full @else lastudioicon-star-rate-1 @endif"></i>
                                <i class="@if($average <= 4.24)lastudioicon-star-rate-2 @elseif($average>=4.25 && $average <= 4.74)fa fa-star-half-full @else lastudioicon-star-rate-1 @endif"></i>
                            </div>
                            <div class="review">
                                <a href="#/">({{count($reviews)}}) @lang('website.customer-review')</a>
                            </div>
                        @else
                            <div class="ratting-icons">
                                @for($i=1;$i<=5;$i++)
                                    <i class="lastudioicon-star-rate-2"></i>
                                @endfor
                                <div class="review">
                                    <a href="#/">(@lang('website.no-reviews'))</a>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="prices">
                        @if(\App\Library\ProductsHelper::get_product_price($product->id)['product_has_action'])
                            <span style="text-decoration:line-through" class="price text-black">
                                {!! \App\Library\ConfigurationHelper::currency(\App\Library\ProductsHelper::get_product_price($product->id)['oldPrice']) !!}
                            </span>

                            <span class="price action-price p-l-10">
                                {!! \App\Library\ConfigurationHelper::currency(\App\Library\ProductsHelper::get_product_price($product->id)['newPrice']) !!}
                            </span>
                            <span class="action-price"
                                  style="font-weight: 300">({!! \App\Library\ProductsHelper::get_product_price($product->id)['discount_percent'] !!}%)</span>

                        @else
                            <span class="price">
                                {!! \App\Library\ConfigurationHelper::currency($product->price ) !!}
                            </span>
                        @endif
                        <div class="available">
                            <span class=" font-size-12"> @lang('website.availability'):</span>
                            @if(count($product->sizes)==0)
                                @if($product->stock==0)
                                    <span id="out-of-stock"
                                          class="text-danger font-size-12">@lang('website.out_of_stock')</span>
                                @elseif($product->stock>0 && $product->stock<=3)
                                    <span id="in-stock"
                                          class="text-warning font-size-12"> @lang('website.low_in_stock')</span>
                                @elseif($product->stock>3)
                                    <span id="in-stock"
                                          class="text-success font-size-12">@lang('website.in_stock')</span>
                                @endif
                            @else
                                <span v-else>
                                <span id="out-of-stock" class="text-danger font-size-12"></span>
                                <span id="in-stock" class="text-success font-size-12"></span>
                            @endif
                            </span>

                        </div>
                    </div>
                    <form class="variations_form cart" method="post" action="/list/{{$product->id}}/add_to_cart">
                        @csrf
                        <input type="hidden" name="selectedSize" v-model="product.selectedSize" id="selectedSize"/>
                        <div class="product-action-size" v-if="sizes.length>0">
                            <span class="title">@lang('website.size') </span>
                            <ul>
                                <li
                                    :id="'sizeId-'+ size.size.replaceAll(' ', '-')"
                                    v-for="(sizeIndex, size) in sizes" :key="sizeIndex"
                                    @click="makeActiveSize(size.size)" class="size-btn">
                                    <a class="action-cart ht-tooltip" :data-tippy-content="size.size"
                                       href="javascript:void(0);">@{{size.size}}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="product-action-color">
                            <span class="title">@lang('website.color') </span>
                            <ul>
                                @if(count($product_colors)>0)
                                    @foreach($product_colors as $product_color)
                                        <a href="{{ url('show/'.$product_color->id) }}"
                                           title="{{\App\Library\LibHelper::echoJson($product_color->name,__('website.lang'))}}">

                                            @if(isset($product_color->color_code) && $product_color->color_code != '#000000')
                                                <li class="ht-tooltip  @if($product_color->id == $product->id) selected-color @endif"
                                                    style="background-color: {{$product_color->color_code}};"
                                                    data-tippy-content="{{\App\Library\LibHelper::echoJson($product_color->name,__('website.lang'))}}">
                                                    @if($product_color->id == $product->id) <i
                                                        class="lastudioicon-check checked-icon"></i> @endif </li>
                                            @else
                                                <li class="ht-tooltip @if($product_color->id == $product->id) selected-color  @else non-selected @endif">
                                                    <img class="color-image"
                                                         src="{{\App\Library\ProductsHelper::get_product_image($product_color)}}"
                                                         data-tippy-content="{{\App\Library\LibHelper::echoJson($product_color->name,__('website.lang'))}}"/>
                                                    @if($product_color->id == $product->id) <i
                                                        class="lastudioicon-check checked-icon  checked-icon-image"></i> @endif
                                                </li>
                                            @endif
                                        </a>
                                    @endforeach
                                @else
                                    <li class="ht-tooltip selected-color"><img class="color-image"
                                                                               src="{{\App\Library\ProductsHelper::get_product_image($product)}}"
                                                                               data-tippy-content="{{\App\Library\LibHelper::echoJson($product->name,__('website.lang'))}}"/>
                                        <i class="lastudioicon-check checked-icon checked-icon-image"></i>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div class="quantity-list-item">
                            <div class="quick-product-action">
                                <div class="action-top">
                                    <div class="pro-qty-area">
                                        <div class="pro-qty">
                                            <input type="text" data-step="1" min="1" name="quantity" id="quantity1"
                                                   title="Quantity" value="1"/>
                                        </div>
                                    </div>
                                    <button id="sizeBtn"
                                            :class="checkClassButton()">
                                        @lang("website.add_to_cart")
                                    </button>
                                </div>
                                <div class="action-bottom">
                                    <a class="btn-wishlist" href="{{ url('add-to-wishlist/'.$product->id) }}"><i
                                            class="labtn-icon labtn-icon-wishlist"
                                            @if(\App\Library\ProductsHelper::checkIfProductInWishlist($product))
                                            style="color: red"
                                            @endif
                                        ></i>@lang('website.add_to_wishlist')
                                    </a>
                                </div>
                                <div class="product-action action-style3" style="display: none;">
                                    <a class=" action-add-to-cart ht-tooltip" id="action-add-to-cart"
                                       data-tippy-content="Add to Cart"
                                       href="javascript:void(0);">
                                    </a>
                                </div>
                                <div class="product-action action-style3">
                                    <div class="action-bottom">
                                        <a class=" action-find-size ht-tooltip" data-tippy-content="Help Center" href="javascript:void(0);">
                                            <i class="lastudioicon-phone-call"></i>@lang('website.you-need-a-help')?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <p class="product-desc">
                        {!! html_entity_decode(\App\Library\LibHelper::echoJson($product->short_description,__('website.lang'))) !!}
                    </p>
                    @if(\App\Library\LibHelper::echoJson($product->more_info,__('website.lang')))
                        <div style="background: #e4eff5;
                            font-size: 14px;
                            padding: 20px 10px;
                            margin-bottom: 30px;">
                            {!! html_entity_decode( \App\Library\LibHelper::echoJson($product->more_info,__('website.lang'))) !!}
                        </div>
                    @endif


                    <div class="product-categorys special">
                        <div class="product-category">
                            @lang('website.category'):
                            @if(count($product->categories)>0)
                                @foreach($product->categories as $key => $c)
                                    <span>{{\App\Library\LibHelper::echoJson($c->category->title, __('website.lang'))}}
                                        @if($key+1 < count($product->categories)) /@endif</span>
                                @endforeach
                            @else
                                <span>@lang('website.undefined')</span>
                            @endif
                        </div>
                    </div>
                    @if(count($product->tags)>1)
                        <div class="widget">
                            <h3 class="title">@lang('website.tags'):</h3>
                            <div class="widget-tags">
                                <ul>
                                    @for($i=0;$i<count($product->tags)-1;$i++)
                                        <li>
                                            <a href="/shop">{{$product->tags[$i]->tag}},</a>
                                        </li>
                                    @endfor
                                    <li>
                                        <a href="#">{{$product->tags[count($product->tags)-1]->tag}}</a>
                                    </li>
                                    {{--                              @foreach($product->tags as $tag)--}}
                                    {{--                                  <li>--}}
                                    {{--                                       <a href="/shop">{{$tag->tag}},</a>--}}
                                    {{--                                  </li>--}}
                                    {{--                              @endforeach--}}
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include('frontend.layout.modals.get-help')
</section>

@section('footer')
    @include('frontend.src.products.single-product.scripts.add-to-cart-scripts')
    @include('frontend.src.products.single-product.scripts.zoom-script')
@endsection

@extends("frontend.src.products.single-product.modals.product-modal-app")
@section('modal')
    <section class="product-area shop-single-product" id="app-modal">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 d-none d-lg-block">
                    <div class="gallery">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{\App\Library\ProductsHelper::get_product_image($product)}}"
                                         style="max-height: 608px;" alt="image-product">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
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
                                <span style="font-size: 12px;"> @lang('website.availability') </span>
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
                        <form class="variations_form cart" method="post" action="/add-to-cart-modal/{{$product->id}}">
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
                                                    <li class="ht-tooltip @if($product_color->id == $product->id) selected-color @else non-selected @endif">
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
                                    <div class="product-action action-style3" style="display: none;">
                                        <a class=" action-add-to-cart ht-tooltip" id="action-add-to-cart"
                                           data-tippy-content="Add to Cart"
                                           href="javascript:void(0);">
                                        </a>
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


                        <div class="product-categorys">
                            <div class="product-category">
                                @lang('website.category'):
                                @if(count($product->categories)>0)
                                    @foreach($product->categories as $key=> $c)
                                        <span>{{$c->category->title[session('lang')??'en']}} @if($key+1 < count($product->categories))
                                                /@endif</span>
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
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-lg-6 d-block d-lg-none special">
                    <div class="gallery">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{\App\Library\ProductsHelper::get_product_image($product)}}"
                                         alt="image-product">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    <script>
        let productSizes = {!! json_encode($product->sizes) !!};
        let product = {!! json_encode($product) !!};
        let app = new Vue({
            el: '#app-modal',
            data: {
                productSizes: productSizes,
                product: product,
                sizes: [],
                showLoader: true
            },
            methods: {
                retClass(index) {
                    let returnValue = 'margin-right: 5px;padding: 0 10px !important; cursor: pointer;float:left;text-align:center;border:3px solid #efefef;';
                    if (index == this.product.selectedSize.replaceAll(' ', '-')) {
                        $('#sizeId-' + index).css('border', '3px solid #000');
                        for (let i = 0; i < this.sizes.length; i++) {
                            if (this.product.selectedSize.replaceAll(' ', '-') == this.sizes[i].size.replaceAll(' ', '-')) {
                                if (parseInt(this.sizes[i].stock) > 0){
                                    document.getElementById('in-stock').innerText = '@lang('website.in_stock')';
                                    document.getElementById('in-stock').classList.remove('red')
                                }
                                else{
                                    document.getElementById('in-stock').innerText = '@lang('website.out_of_stock')';
                                    document.getElementById('in-stock').classList.add('red');
                                }

                            }
                        }
                    } else
                        $('#sizeId-' + index).css('border', '3px solid #efefef');
                    return returnValue;
                },

                checkAddToCartButton() {
                    if (typeof this.product.selectedSize != 'undefined' && this.product.selectedSize != null)
                        return false;
                    return true;
                },

                checkClassButton() {
                    let disabledClass = 'btn-theme btn-black disabled'
                    let flag = false;
                    for (let i = 0; i < productSizes.length; i++) {
                        if (productSizes[i].size == this.product.selectedSize && productSizes[i].stock > 0)
                            flag = true;
                    }
                    if (productSizes.length > 0) {
                        if ((typeof this.product.selectedSize != 'undefined' && this.product.selectedSize != null && flag == true)) {
                            disabledClass = 'btn-theme btn-black';
                            document.getElementById('sizeBtn').classList.remove('disabled')

                        }
                    } else {
                        if (this.product.stock > 0) {
                            disabledClass = 'btn-theme btn-black';
                            document.getElementById('sizeBtn').classList.remove('disabled')
                        }
                    }

                    return disabledClass


                },

                checkClassDiv() {
                    if (typeof this.product.selectedSize != 'undefined')
                        return 'akasha-variation-add-to-cart variations_button';
                    return 'akas' +
                        'ha-variation-add-to-cart variations_button akasha-variation-add-to-cart-disabled';
                },
                checkClassWishlist() {
                    if (typeof this.product.selectedSize != 'undefined') {
                        return 'add_to_wishlist';
                    }
                    return 'add_to_wishlist disabled wish-disabled';
                },

                makeActiveSize(index) {
                    const self = this;
                    this.product.selectedSize = index;
                    this.sizes.map(size => {
                            if (size.size == index) {
                                size.active = true;
                                $('#selectedSize').val(self.product.selectedSize);
                            } else
                                size.active = false;
                            self.retClass(size.size);
                        }
                    );
                    this.checkClassButton();
                },
            },
            created() {
                const self = this;
                this.product.selectedSize = null;
                axios.get('/product/getSize?product=' + this.product.id)
                    .then(function (response) {
                        // handle success
                        response.data.values.map(function (i) {
                            if (i.stock > 0) {
                                self.sizes.push(
                                    {
                                        size: i.size,
                                        stock: i.stock,
                                        active: false
                                    }
                                )
                            }
                        });
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
            }
        })
    </script>

@endsection

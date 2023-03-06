@extends('admin.layout.app')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div>
                <form action="/admin/product/store" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$product->id ?? 0}}"/>

                    {{--                    validation error messages--}}
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    @endif
                    <div class="row">
                        <?php $languages = \App\Library\LibHelper::languages  ?>
                        <div class="col-xl-8">
                            <div class="row layout-top-spacing">
                                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                    <div class="widget-content widget-content-area br-6">
                                        <div class="row">
                                            <div class="col-6">
                                                <h4>@lang("website.general")</h4>
                                            </div>
                                            <div class="col-6 text-right">
                                                <a href="/admin/products"
                                                   class="btn btn-info">@lang("website.view")@lang("website.products")</a>
                                            </div>
                                        </div>
                                        <hr class="m-2"/>
                                        <div class="statbox widget box box-shadow-none">
                                            <div class="form-row">
                                                @foreach($languages as $lang)
                                                    {{--                                                    add product name for each language--}}
                                                    <div class="col-md-6 mb-3">
                                                        <label for="title_{{$lang}}">@lang("website.product_name")
                                                            ({{$lang}})</label>
                                                        <input onkeyup="checkIfDisabledBtn()" type="text"
                                                               name="name_{{$lang}}"
                                                               placeholder="@lang("website.product-name") ({{$lang}})"
                                                               class="form-control check-if-empty"
                                                               id="title_{{$lang}}"
                                                               value="{{$product->name[$lang] ??  old('name_'.$lang)}}"
                                                               required
                                                        >
                                                        @error('name_'.$lang) <span
                                                            class="text-danger">{{$message}}</span> @enderror
                                                    </div>
                                                @endforeach
                                            </div>
                                            @foreach($languages as $lang)
                                                <div class="form-group mb-3">
                                                    <label> @lang("website.short-description")({{$lang}})</label>
                                                    <textarea name="short-description-{{$lang}}" rows="5"
                                                              class="form-control min-height-300 textEditor"
                                                    >{{$product->short_description[$lang] ??  old('short-description-'.$lang)}}</textarea>
                                                    @error('short-description-'.$lang) <span
                                                        class="text-danger">{{$message}}</span> @enderror
                                                </div>
                                            @endforeach
                                            <div class="form-row mb-3">
                                                <div class="col-md-6">
                                                    <label for="price">@lang("website.price")</label>
                                                    <div class="input-group">
                                                        <input id="price" name="price" type="number" min="0.00"
                                                               step="0.01"
                                                               class="form-control"
                                                               aria-label="Amount (to the nearest dollar)"
                                                               onkeyup="checkIfDisabledBtn()"
                                                               value="{{$product->price ?? old('price')}}" required>
                                                        @error('price') <span
                                                            class="text-danger">{{$message}}</span> @enderror
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">.00</span>
                                                            <span class="input-group-text">€</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <label class="">@lang("website.stock") </label>
                                                    <small>* @lang("website.number_of_available_items") </small>
                                                    <input name="stock" id="stock" type="number" class="form-control"
                                                           placeholder="" min="0.00"
                                                           value="{{$product->stock ?? 0}}" required>
                                                    @error('stock') <span
                                                        class="text-danger">{{$message}}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="form-row mb-3">
                                                <div class="col-md-6">
                                                    <label for="code">@lang("website.reference_code")</label>
                                                    <br>
                                                    <small>* @lang("website.unique-for-each-product")
                                                    </small>
                                                    <input name="code" id="code" type="text" class="form-control"
                                                           placeholder=""
                                                           value="{{$product->code ?? old('code')}}"
                                                           onkeyup="checkIfDisabledBtn()"
                                                           required>
                                                    @error('code') <span
                                                        class="text-danger">{{$message}}</span> @enderror
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <label for="product-key">@lang("website.product_key") </label>
                                                    <br>
                                                    <small>* @lang("website.enter_the_same_product_key_for_the_same_products_with_different_colors")
                                                    </small>
                                                    <input name="productKey" id="product-key" type="text"
                                                           class="form-control"
                                                           placeholder=""
                                                           value="{{$product->productKey ?? old('productKey')}}">
                                                    @error('productKey') <span
                                                        class="text-danger">{{$message}}</span> @enderror
                                                </div>
                                            </div>
                                            @foreach($languages as $lang)
                                                <div class="form-group mb-3">
                                                    <label>@lang("website.product") @lang("website.description")
                                                        ({{$lang}})</label>
                                                    <textarea name="description_{{$lang}}" rows="5"
                                                              class="form-control min-height-300 textEditor"
                                                    >{{$product->description[$lang] ??  old('description_'.$lang)}}</textarea>
                                                    @error('description_'.$lang) <span
                                                        class="text-danger">{{$message}}</span> @enderror
                                                </div>
                                            @endforeach
                                            <div class="form-row mb-3">
                                                <div class="col-md-4 col-sm-6">
                                                    <label for="color">@lang("website.color") </label>
                                                    <br>
                                                    <small>* @lang("website.select-product-color") </small>
                                                    <input type="text" class="form-control" name="color" id="color"
                                                           @if(isset($product) && $product->color!='') style="background: {{$product->color}}"
                                                           @endif placeholder="format #xxxxxx ex. #1e0773" readonly
                                                    >
                                                    @error('color_code') <span
                                                        class="error text-danger">{{ $message }}</span> @enderror

                                                </div>
                                                <div class="col-md-4 col-sm-6">
                                                    <p class=""></p>
                                                    <small>* @lang("website.check-if-the-product-is-bestseller") </small>
                                                    <br/>
                                                    <label class="switch s-success m-0">
                                                        <input type="checkbox"
                                                               @if(isset($product) && $product->isBestseller == 1) checked
                                                               @endif name="isBestseller" value="1">
                                                        <span class="slider round"></span>
                                                    </label>
                                                    <span class="in-new-label"
                                                          style="color: #acb0c3; font-size: 15px;">@lang("website.bestseller")</span>

                                                    @error('isBestseller') <span
                                                        class="text-danger">{{$message}}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="form-row mb-3">
                                                <div class="col-md-6 col-sm-6">
                                                    <label class="">@lang("website.description-image") </label>
                                                    <br>
                                                    <small>* @lang("website.upload-description-image") </small>
                                                    <input type="file" class="form-control" name="descriptionImage"
                                                           value="{{$product->description_image ?? ''}}"
                                                    >
                                                    @error('description_image') <span
                                                        class="error text-danger">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    @if(isset($product) && $product->description_image!=null)
                                                        <img src="{{asset($product->description_image)}}"
                                                             style="height: 100px;"/>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-row mb-3">
                                                @foreach($languages as $lang)
                                                    <div class="col-md-6 col-sm-6">
                                                        <label class="prod-name">@lang("website.expert-tips") ({{$lang}}
                                                            )</label>
                                                        <textarea name="expert_tips_{{$lang}}" rows="5"
                                                                  class="min-height-300 textEditor"
                                                        >{{$product->expert_tips[$lang] ?? old('expert_tips')}}</textarea>
                                                        @error('expert_tips_'.$lang) <span
                                                            class="text-danger">{{$message}}</span> @enderror
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="form-row mb-3">
                                                @foreach($languages as $lang)
                                                    <div class="col-md-6 col-sm-6">
                                                        <label class="prod-name">@lang("website.more-info") ({{$lang}}
                                                            )</label>
                                                        <br>
                                                        <textarea name="more_info_{{$lang}}" rows="5"
                                                                  class="min-height-300 textEditor"
                                                        >{{$product->more_info[$lang] ?? old('more_info')}}</textarea>
                                                        @error('more_info_'.$lang) <span
                                                            class="text-danger">{{$message}}</span> @enderror
                                                    </div>
                                                @endforeach
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if(isset($product->seo))
                                <div class="row layout-top-spacing">
                                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing p-0-auto">
                                        <div class="widget-content widget-content-area br-6">
                                            <h4>@lang("website.search_engine_optimization")</h4>
                                            <div class="statbox widget box box-shadow-none">
                                                <div class="form-group">
                                                    <h4 class="prod-name">@lang("website.url_key")  </h4>
                                                    <input type="text" class="form-control" id="url" name="seoUrlKey"
                                                           placeholder="cassina-zig-zag-chair"
                                                           value="{{$product->seo->url_key ?? old('seoUrlKey')}}">
                                                </div>
                                                <div class="form-group">
                                                    <h4 class="prod-name">@lang("website.meta_title") </h4>
                                                    <input type="text" class="form-control" id="meta-title"
                                                           name="seoTitle"
                                                           placeholder=""
                                                           value="{{$product->seo->title ?? old('seoTitle')}}">
                                                </div>
                                                <div class="form-group">
                                                    <h4 class="prod-name">@lang("website.meta_description")  </h4>
                                                    <input type="text" class="form-control" id="meta-description"
                                                           name="seoDescription" placeholder=""
                                                           value="{{$product->seo->description ?? old('seoDescription')}}">
                                                    <small> @lang("website.max_chars")</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                        <div class="col-xl-4">
                            <div class="row layout-top-spacing">
                                <div class="col-xl-12 col-lg-12 col-sm-12 p-0-auto">
                                    <div class="widget-content widget-content-area br-6 prod-status p-0">
                                        <div>
                                            <div class="widget-content widget-content-area br-6 p-0">
                                                <div class="row p-20-0">
                                                    <div class="col-12 align-left p-5-0-0-30">
                                                        <label class="switch s-success m-0">
                                                            <input type="checkbox"
                                                                   @if((isset($product) && $product->status == 1) || !isset($product))
                                                                   checked
                                                                   @endif
                                                                   name="status" value="1">
                                                            <span class="slider round"></span>
                                                        </label>
                                                        <span
                                                            class="in-new-label">@lang("website.enable_product")</span>
                                                    </div>
                                                    <div class="col-12 align-left p-5-0-0-30">
                                                        <label class="switch s-success m-0">
                                                            <input type="checkbox"
                                                                   @if((isset($product) && $product->isNew == 1) || !isset($product)) checked
                                                                   @endif name="isNew"
                                                                   value="1">
                                                            <span class="slider round"></span>
                                                        </label>
                                                        <span class="in-new-label">@lang("website.new_product")</span>
                                                    </div>
                                                    <div class="col-12 align-left p-5-0-0-30">
                                                        <label class="switch s-success m-0">
                                                            <input type="checkbox"
                                                                   @if(isset($product) && $product->onSale == 1) checked
                                                                   @endif name="onSale" value="1">
                                                            <span class="slider round"></span>
                                                        </label>
                                                        <span class="in-new-label">@lang("website.sale")</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row layout-top-spacing">
                                <div class="col-xl-12 col-lg-12 col-sm-12 p-0-auto">
                                    <div class="widget-content widget-content-area br-6 prod-status p-0">
                                        <div class="row">
                                            <div id="fs2Tagging" class="col-lg-12">
                                                <div class="statbox widget box box-shadow-none p-10-20">
                                                    <label>Tags</label>
                                                    <br>
                                                    <small>Separate with comma (,)</small>
                                                    <input type="text" class="form-control" name="tags" placeholder=""
                                                           value="{{$product->tags ?? old('tags')}}"/>

                                                    <label>Categories</label>
                                                    <br>
                                                    <div class="categories-container">
                                                        @foreach($main_categories as $category)
                                                            <hr/>
                                                            <label class="main-cat-label uppercase"
                                                                   for="category{{$category->id}}">{{$category->title['en']}}</label>
                                                            <input class="main-cat-label check-if-checked-category"
                                                                   type="checkbox"
                                                                   onchange="checkIfDisabledBtn()"
                                                                   id="category_{{$category->parent_id}}_{{$category->id}}"
                                                                   name="categories[]"
                                                                   value="{{$category->id}}"
                                                                   @if(isset($product))
                                                                   @if(in_array($category->id, $product->categories->pluck('category_id')->toArray())) checked
                                                                   @elseif(!empty(array_intersect($category->subcategories->pluck('id')->toArray(), $product->categories->pluck('category_id')->toArray()))) checked
                                                                @endif
                                                                @endif
                                                            >
                                                            <br/>
                                                            @foreach($category->subcategories as $subcategory)
                                                                <label class="cat-label pl-20 uppercase"
                                                                       for="category{{$subcategory->id}}"
                                                                >{{$subcategory->title['en']}}</label>
                                                                <input class="cat-label check-if-checked-category"
                                                                       type="checkbox"
                                                                       onchange="selectAllRelated({{$subcategory->parent_id}},{{$subcategory->id}},'subcategory','category')"
                                                                       id="subcategory_{{$subcategory->parent_id}}_{{$subcategory->id}}"
                                                                       name="categories[]" value="{{$subcategory->id}}"
                                                                       @if(isset($product) )
                                                                       @if(in_array($subcategory->id, $product->categories->pluck('category_id')->toArray())) checked
                                                                       @elseif(!empty(array_intersect($subcategory->subcategories->pluck('id')->toArray(), $product->categories->pluck('category_id')->toArray()))) checked
                                                                    @endif
                                                                    @endif>
                                                                <br/>
                                                                @foreach($subcategory->subcategories as $child)
                                                                    <label class="cat-label pl-40 uppercase"
                                                                           for="category{{$child->id}}"
                                                                    >{{$child->title['en']}}</label>
                                                                    <input class="cat-label check-if-checked-category"
                                                                           type="checkbox"
                                                                           onchange="selectAllRelated({{$child->parent_id}},{{$child->id}},'child','subcategory')"
                                                                           id="child_{{$child->parent_id}}_{{$child->id}}"
                                                                           name="categories[]" value="{{$child->id}}"
                                                                           @if(isset($product))
                                                                           @if(in_array($child->id, $product->categories->pluck('category_id')->toArray())) checked
                                                                           @elseif(!empty(array_intersect($child->subcategories->pluck('id')->toArray(), $product->categories->pluck('category_id')->toArray()))) checked
                                                                        @endif
                                                                        @endif>
                                                                    <br/>
                                                                    @foreach($child->subcategories as $subtitle)
                                                                        <label class="cat-label pl-60 uppercase"
                                                                               for="category{{$subtitle->id}}"
                                                                        >{{$subtitle->title['en']}}</label>
                                                                        <input
                                                                            class="cat-label check-if-checked-category"
                                                                            type="checkbox"
                                                                            onchange="selectAllRelated({{$subtitle->parent_id}},{{$subtitle->id}},'subtitle','child')"
                                                                            id="subtitle_{{$subtitle->parent_id}}_{{$subtitle->id}}"
                                                                            name="categories[]"
                                                                            value="{{$subtitle->id}}"
                                                                            @if(isset($product))
                                                                            @if(in_array($subtitle->id, $product->categories->pluck('category_id')->toArray())) checked
                                                                            @endif
                                                                            @endif>
                                                                        <br/>
                                                                    @endforeach
                                                                @endforeach
                                                            @endforeach
                                                        @endforeach
                                                    </div>
                                                    @error('categories') <span
                                                        class="text-danger">{{$message}}</span> @enderror

                                                </div>
                                                <div class="statbox widget box box-shadow-none p-0-20-10">
                                                    <div class="mt-80">
                                                        <label>Filters</label>
                                                        <br>
                                                        @foreach($main_filters as $filter)

                                                            @if(count($filter->options)>0)
                                                                <p class="mt-20 uppercase">{{$filter->title['en']}} </p>
                                                                <select class="form-control tagging"
                                                                        name="{!! '_'. str_replace(' ','_',strtolower($filter->title['en'])) !!}[]"
                                                                        multiple>
                                                                    <option value="">-</option>

                                                                    @foreach(($filter->options) as $option)

                                                                        <option
                                                                            value="{{str_replace(' ','_',strtolower($option->id))}}"
                                                                            @if(isset($product)  && $product->filters!=null && in_array($option->id, json_decode($product->filters))) selected @endif

                                                                        >
                                                                            {{$option->title['en']}}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(isset($product))
                                @include('admin.src.products.product-sizes.sizes')
                            @endif
                            @if(isset($product))
                                @include('admin.src.products.product-images.media')
                            @endif
                            <div class="row layout-top-spacing">
                                <div class="col-xl-12 col-lg-12 col-sm-12 p-0-15">
                                    <div class="widget-content widget-content-area br-6 prod-status text-right p-10">
                                        <a type="button" href="/admin/products"
                                           class="btn btn-outline-info">@lang("website.cancel")</a>
                                        <button id="submitButton" type="submit"
                                                class="btn btn-info">@lang("website.save")</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('admin.src.products.scripts.add-product-scripts')


@endsection

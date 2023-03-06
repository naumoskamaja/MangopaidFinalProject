@extends('admin.layout.app')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>@lang("website.add_category")</h4>
                            </div>
                        </div>
                        <hr/>
                        <form action="{{url('/admin/category/store') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$category->id ?? 0}}" name="category_id"/>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="row">
                                            @foreach(\App\Library\LibHelper::languages as $lang)
                                                <div class="col-md-6">
                                                    <label for="category-title">Title {{$lang}}</label>
                                                    <input type="text" name="title[{{$lang}}]" class="form-control"
                                                           id="category-title"
                                                           value="{{$category->title[$lang] ?? old('title['.$lang.']')}}"
                                                           required
                                                    >
                                                    @error('title['.$lang.']') <span
                                                        class="error text-danger">{{ $message }}</span> @enderror
                                                </div>
                                            @endforeach
                                            <div class="col-md-6">
                                                <label for="category-parent">@lang("website.parent_category")</label>
                                                <select class="form-control" name="parent_id" id="category-parent"
                                                        required>
                                                    <option value=""></option>

                                                    <option value="0"
                                                            @if(isset($category) && $category->parent_id==0) selected @endif>
                                                        -
                                                    </option>

                                                    @foreach($main_categories as $cat)
                                                        <option value="{{$cat->id}}" class="text-danger"
                                                                @if(isset($category) && $category->parent_id==$cat->id) selected @endif >{{$cat->title['en']}} </option>
                                                        @foreach($cat->subcategories as $subcat)
                                                            <option value="{{$subcat->id}}"
                                                                    @if(isset($category) && $category->parent_id==$subcat->id) selected @endif >{{$subcat->title['en']}} </option>
                                                            @foreach($subcat->subcategories as $child)
                                                                <option value="{{$child->id}}"
                                                                        class="p-l-20 child-category-title"
                                                                        @if(isset($category) && $category->parent_id==$child->id) selected @endif >
                                                                    Title: {{$child->title['en']}} </option>
                                                            @endforeach
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                                @error('parent_id') <span
                                                    class="error text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="category-title">@lang("website.upload_image")</label>
                                                    <input class="admin-category-image-input"
                                                           type="file" name="image"
                                                           value="{{$category->image ?? old('image')}}">
                                                    @error('image') <span
                                                        class="error text-danger">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    @if(isset($category) && $category->image!=null)
                                                        <img src="{{asset($category->image)}}" alt="icon"
                                                             class="height-60">
                                                        <br/>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label
                                                        for="category-title">@lang("website.upload_shop_section_banner")</label>
                                                    <input class="admin-category-image-input"
                                                           type="file" name="shop_section_banner"
                                                           value="{{$category->shop_section_banner ?? old('shop_section_banner')}}">
                                                    @error('shop_section_banner') <span
                                                        class="error text-danger">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    @if(isset($category) && $category->shop_section_banner!=null)
                                                        <img src="{{asset($category->shop_section_banner)}}" alt="icon"
                                                             class="height-60">
                                                        <br/>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="filters-category-section">
                                                        <?php $main_filters = \App\Library\FiltersHelper::getMainFilters(); ?>
                                                        @foreach($main_filters as $filter)
                                                            <div class="n-chk">
                                                                <label
                                                                    class="new-control new-checkbox checkbox-success">
                                                                    <input type="checkbox" value="{{$filter->id}}"
                                                                           @if(isset($selected_filters) && count($selected_filters)>0 && in_array($filter->id, $selected_filters)) checked
                                                                           @endif
                                                                           name="selectedFilters[]"
                                                                           class="new-control-input">
                                                                    <span
                                                                        class="new-control-indicator filter-label-category-section"></span>{{$filter->title[__('website.lang')]}}
                                                                </label>
                                                            </div>
                                                            @foreach($filter->options as $option)
                                                                <div class="n-chk" style="padding-left: 40px">
                                                                    <label
                                                                        class="new-control new-checkbox checkbox-success">
                                                                        <input type="checkbox" value="{{$option->id}}"
                                                                               @if(isset($selected_filters) && count($selected_filters)>0 && in_array($option->id, $selected_filters)) checked
                                                                               @endif
                                                                               name="selectedFilters[]"
                                                                               class="new-control-input">
                                                                        <span
                                                                            class="new-control-indicator filter-label-category-section"></span>{{$option->title[__('website.lang')]}}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 text-right">
                                        <div class="action-btn align-right mt-40">
                                            <a type="button" href="/admin/categories"
                                               class="btn btn-outline-info"> @lang("website.cancel") </a>
                                            <button type="submit"
                                                    class="btn btn-info"> @lang("website.save") </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('admin.layout.app')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="layout-px-spacing">
                            <div class="row layout-spacing layout-top-spacing" id="cancel-row">
                                <div class="col-lg-12">
                                    <div class="widget-content searchable-container list">
                                        <form action="{{url('/admin/section_banner/store') }}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="banner_id" value="{{$banner->id ?? 0}}"/>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="page"> @lang("website.page") </label>
                                                    <?php $pages = ["about", "privacy_policy",
                                                        "terms_and_conditions", "faq", "careers", "subscribe_section", "shop_page", "cart_page",
                                                        "tracking_order_page", "checkout_page", "wishlist", "cart_page", "contact_page"]; ?>
                                                    <select class="form-control" name="page" id="page" required>
                                                        <option value=""></option>
                                                        @foreach($pages as $page)
                                                            <option value="{{$page}}"
                                                                    @if(isset($banner) && $banner->page==$page) selected @endif>@lang('website.'.$page)
                                                                (@lang('website.recommended'): 1730px/219px)
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('page') <span
                                                        class="error text-danger">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="image">@lang("website.image")</label>
                                                    <input class="form-control admin-banner-image-input"
                                                           type="file" name="image" @if(!isset($banner)) required @endif />
                                                    @error('image') <span class="error text-danger">{{ $message }}</span> @enderror
                                                </div>

                                                @if(isset($banner) && $banner->image!=null)
                                                    <div class="col-md-3">
                                                        <img src="{{asset($banner->image)}}"
                                                             class="section-banner-image"/>
                                                        <br/>

                                                    </div>
                                                @endif

                                                <div class="col-12 text-right">
                                                    <div class="action-btn align-right mt-40">
                                                        <a type="button" href="/admin/section_banners"
                                                           class="btn btn-outline-info"> @lang("website.cancel") </a>
                                                        <button type="submit"
                                                                class="btn btn-info"> @lang("website.save") </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

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
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4>@lang("website.add-banner")</h4>
                                            </div>
                                        </div>
                                        <hr/>
                                        <form action="/admin/banner/store" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="banner_id" value="{{$banner->id ?? 0}}">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <label for="title"> Title </label>
                                                    <input class="form-control" type="text" name="title"
                                                           value="{{$banner->title ?? ''}}">
                                                    @error('title') <span
                                                        class="error text-danger">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <label for="title"> Subtitle </label>
                                                    <input class="form-control" type="text" name="subtitle"
                                                           value="{{$banner->subtitle ?? ''}}">
                                                    @error('subtitle') <span
                                                        class="error text-danger">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <label for="place"> @lang("website.place") </label>
                                                    <select class="form-control" name="place" id="place" required>
                                                        <option value=""></option>
                                                        <option value="1"
                                                                @if(isset($banner) && $banner->place==1) selected @endif>
                                                            Slider (1987px/600px)
                                                        </option>
                                                        <option value="2"
                                                                @if(isset($banner) && $banner->place==2) selected @endif>
                                                            Two Large Banners (680px/960px)
                                                        </option>
                                                        <option value="3"
                                                                @if(isset($banner) && $banner->place==3) selected @endif>
                                                            Banner with right side text (1352px/800px)
                                                        </option>
                                                        <option value="4"
                                                                @if(isset($banner) && $banner->place==4) selected @endif>
                                                            Fullwidth Banner with Text (2114px/600px)
                                                        </option>
                                                        <option value="5"
                                                                @if(isset($banner) && $banner->place==5) selected @endif>
                                                            Two Parallel Banners (680px/960px)
                                                        </option>
                                                    </select>
                                                    @error('place') <span
                                                        class="error text-danger">{{ $message }}</span> @enderror
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <label for="image">
                                                        @lang("website.web-image")
                                                    </label>
                                                    <input class="form-control admin-banner-image-input" type="file"
                                                           name="image" @if(!isset($banner)) required @endif>
                                                    @error('image') <span
                                                        class="error text-danger">{{ $message }}</span> @enderror
                                                </div>
                                                @if(isset($banner) && $banner->image != null)
                                                    <div class="col-lg-6 col-md-6 col-sm-12 p-5">
                                                        <img src="{{asset($banner->image)}}"
                                                             style="height: 160px !important;; margin-left: 10px !important;"/>
                                                    </div>
                                                @endif
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <label for="image-mobile">
                                                        @lang("website.mobile-image")
                                                    </label>
                                                    <input class="form-control admin-banner-image-input" type="file"
                                                           name="mobile_image">
                                                    @error('mobile_image') <span
                                                        class="error text-danger">{{ $message }}</span> @enderror
                                                </div>
                                                @if(isset($banner) && $banner->mobile_image != null)
                                                    <div class="col-lg-6 col-md-6 col-sm-12 p-5">
                                                        <img src="{{asset($banner->mobile_image)}}"
                                                             style="height: 160px !important;; margin-left: 10px !important;"/>
                                                    </div>
                                                @endif
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <label for="description"> @lang("website.description") </label>
                                                    <input class="form-control" type="text" name="description"
                                                           value="{{$banner->description ?? ''}}">
                                                    @error('description') <span
                                                        class="error text-danger">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <label for="link"> @lang("website.link") </label>
                                                    <input class="form-control" type="text" name="link"
                                                           value="{{$banner->link ?? ''}}">
                                                    @error('link') <span
                                                        class="error text-danger">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="col-12 text-right">
                                                    <div class="action-btn align-right mt-40">
                                                        <a type="button" href="/admin/banners"
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

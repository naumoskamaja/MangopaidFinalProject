@extends('admin.layout.app')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="row">
                            <div class="col-6">
                                <h4>@lang("website.banners")</h4>
                            </div>
                            <div class="col-6 text-right">
                                <a href="/admin/banner/add" class="btn btn-info">+ @lang("website.add_banner")</a>
                            </div>
                        </div>
                        <hr/>
                        <div>
                            @include('admin.src.banners.banners.category-banners')
                            @include('admin.src.banners.banners.sliders')
                            @include('admin.src.banners.banners.side-text-sliders')
                            @include('admin.src.banners.banners.fullwidth-banner')
                            @include('admin.src.banners.banners.two-large-banners')
                            @include('admin.src.banners.banners.two-parallel-banners')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

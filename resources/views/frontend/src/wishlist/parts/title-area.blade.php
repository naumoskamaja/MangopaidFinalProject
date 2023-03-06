<section class="page-title-area bg-img bg-overlay-black2-5" data-speed="1.1"
         data-bg-img=@if ($banner!=null) {{asset($banner->image)}} @else "/assets/gallery/main-banner.jpg" @endif>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-content">
                    <h2 class="title">@lang('website.'.$page)</h2>
                    <div class="bread-crumbs"><a href="/">@lang('website.home')<span class="breadcrumb-sep">></span></a><span
                            class="active">@lang('website.'.$page)</span></div>
                </div>
            </div>
        </div>
    </div>
</section>

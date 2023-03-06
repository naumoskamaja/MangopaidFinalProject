<section class="page-title-area bg-img bg-overlay-black2-5 bg-parallax" data-speed="1.1"
         data-bg-img=@if($shopSectionBanner!='') {{asset($shopSectionBanner)}} @elseif ($banner!=null) {{asset($banner->image)}} @else "/assets/gallery/main-banner.jpg" @endif>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-content">
                    <h2 class="title" style="color: white !important;">@if($bannerTitle != '') {{$bannerTitle[session('lang')??'en']}} @else @lang('website.shop') @endif</h2>
                    <div class="bread-crumbs"><a href="/" style="color: white !important;">@lang('website.home')<span class="breadcrumb-sep">></span></a>
                        @if($bannerTitle != '')
                            <a href="/search" style="color: white !important;">@lang('website.shop')<span class="breadcrumb-sep">></span></a>
                            <span class="active">{{$bannerTitle[session('lang')??'en']}}</span>
                        @else
                            <span class="active">@lang('website.shop')</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

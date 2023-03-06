<section class="category-area category-style6-area">
    <div class="container-fluid p-0">
        <div class="row row-gutter-0 category-items-style10">
        @foreach($two_parallel_banners as $banner)
                <div class="col-md-6">
                    <div class="category-item">
                        <div class="thumb">
                            <a href="{{$banner->link ?? '/search'}}">
                                <img class="d-block d-sm-none" src="{{asset($banner->mobile_image ?? $banner->image)}}" alt="Moren-Image">
                                <img class="d-none d-sm-block" src="{{asset($banner->image)}}" alt="Moren-Image">
                            </a>
                            <a class="category-banner-link" href="{{$banner->link ?? '/search'}}"></a>
                        </div>
                        <div class="content">
                            <h4 class="title">{{$banner->title}}</h4>
                            <a class="btn-theme" href="{{$banner->link ?? '/search'}}">@lang('website.read-more')</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

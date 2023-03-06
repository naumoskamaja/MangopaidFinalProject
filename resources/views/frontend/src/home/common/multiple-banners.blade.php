<section class="category-area category-arrivals-area">
    <div class="container">
        <?php $two_large_banners = \App\Library\BannersHelper::getBannersFrontend()['two_large_banners'] ?>
        <div class="row row-gutter-80 category-items-style11">
            <div class="col-md-6" data-aos="fade-up" data-aos-duration="1000">
                <div class="category-item hover-effect effect-style1 mb-sm-30">
                    <div class="thumb">
                        <a href="{{$two_large_banners[0]->link ?? '/search'}}">
                            <img class="d-block d-sm-none"
                                 src="{{asset($two_large_banners[0]->mobile_image ?? $two_large_banners[0]->image)}}"
                                 alt="Banner-Image">
                            <img class="d-none d-sm-block" src="{{asset($two_large_banners[0]->image)}}"
                                 alt="Banner-Image">
                        </a>
                        <a class="category-banner-link"
                           href="{{$two_large_banners[0]->link ?? '/search'}}">
                        </a>
                        <div class="effect-content"></div>
                    </div>
                    <div class="content">
                        <div class="inner-content">
                            <h4 class="title">{{$two_large_banners[0]->title}}</h4>
                            <p>{{$two_large_banners[0]->description}}</p>
                            <a class="btn-theme"
                               href="{{$two_large_banners[0]->link ?? '/search'}}">
                                @lang('website.shop-now')</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-up" data-aos-duration="1200">
                <div class="category-item hover-effect effect-style1">
                    <div class="content content-style2">
                        <div class="inner-content">
                            <h4 class="title">{{$two_large_banners[1]->title}}</h4>
                            <p>{{$two_large_banners[1]->description}}</p>
                            <a class="btn-theme"
                               href="{{$two_large_banners[1]->link ?? '/search'}}">
                                @lang('website.shop-now')</a>
                        </div>
                    </div>
                    <div class="thumb">
                        <a href="{{$two_large_banners[1]->link ?? '/search'}}">
                            <img class="d-block d-sm-none"
                                 src="{{asset($two_large_banners[1]->mobile_image ?? $two_large_banners[1]->image)}}"
                                 alt="Banner-Image">
                            <img class="d-none d-sm-block" src="{{asset($two_large_banners[1]->image)}}"
                                 alt="Banner-Image">
                        </a>
                        <a class="category-banner-link"
                           href="{{$two_large_banners[1]->link ?? '/search'}}"></a>
                        <div class="effect-content"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

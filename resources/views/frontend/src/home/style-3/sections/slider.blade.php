<section class="home-slider-area slider-default slider-background-style-3">
    <div class="home-slider-content slider-content ">
        <div class="swiper-container mySwiperSlider">
            <div class="swiper-wrapper">
                @foreach($sliders as $slider)
                    <div class="swiper-slide">
                        <div class="home-slider-item">
                            <div class="bg-thumb bg-overlay bg-img d-block d-sm-none"
                                 data-bg-img="{{asset($slider->mobile_image ?? $slider->image)}}"></div>
                            <div class="bg-thumb bg-overlay bg-img d-none d-sm-block"
                                 data-bg-img="{{asset($slider->image)}}"></div>
                            <div class="slider-content-area">
                                <div class="container">
                                    <div class="row align-items-center">
                                        <div class="col-md-8 col-lg-5 m-auto">
                                            <div class="content">
                                                <div class="inner-content">
                                                    <h2>{{$slider->title}}</h2>
                                                    <p>{{$slider->description}}</p>
                                                    <a href="{{$slider->link ?? '/search'}}" class="btn-theme btn-black"
                                                       style="margin-top: 30px;">@lang('website.view-more')</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

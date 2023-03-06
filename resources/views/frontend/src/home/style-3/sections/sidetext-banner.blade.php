<section class="collection-slider-area">
    <div class="collection-slider-content">
        <div class="swiper-container collection-slider-container">
            <div class="swiper-wrapper">
                @foreach($side_text_sliders as $slider)
                    <div class="swiper-slide">
                        <!-- Start Slide Item -->
                        <div class="slider-item">
                            <div class="thumb">
                                <div class="bg-thumb bg-overlay bg-img d-block d-sm-none"
                                     data-bg-img="{{asset($slider->mobile_image ?? $slider->image)}}"></div>
                                <div class="bg-thumb bg-overlay bg-img d-none d-sm-block"
                                     data-bg-img="{{asset($slider->image)}}"></div>
                            </div>
                            <div class="slider-content-area">
                                <div class="content">
                                    <div class="inner-content">
                                        <span>@lang('website.collection')</span>
                                        <h2>{{$slider->title}}</h2>
                                        <p>{{$slider->description}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Slide Item -->
                    </div>
                @endforeach
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</section>

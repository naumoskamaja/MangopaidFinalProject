<section class="divider-area bg-overlay2 bg-img d-block d-sm-none"
         data-bg-img="{{asset($fullwidth_banner->mobile_image ?? $fullwidth_banner->image)}}">
    @include('frontend.src.home.common.parts.fullwidth-banner-content')
</section>
<section class="divider-area bg-overlay2 bg-img d-none d-sm-block"
         data-bg-img="{{asset($fullwidth_banner->image)}}">
    @include('frontend.src.home.common.parts.fullwidth-banner-content')
</section>


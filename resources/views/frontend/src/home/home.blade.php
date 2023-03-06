<?php $two_large_banners = \App\Library\BannersHelper::getBannersFrontend()['two_large_banners'] ?>
<?php $sliders = \App\Library\BannersHelper::getBannersFrontend()['sliders'] ?>
<?php $side_text_sliders = \App\Library\BannersHelper::getBannersFrontend()['side_text_sliders'] ?>
<?php $fullwidth_banner = \App\Library\BannersHelper::getBannersFrontend()['fullwidth_banner'] ?>
<?php $two_parallel_banners = \App\Library\BannersHelper::getBannersFrontend()['two_parallel_banners'] ?>
@extends('frontend.layout.app')
@section('content')
    @if(isset($conf) && $conf!=null)
        @switch($conf->template)
            @case(2)
            @include('frontend.src.home.style-2.style-2')
            @break
            @case(3)
            @include('frontend.src.home.style-3.style-3')
            @break
            @case(4)
            @include('frontend.src.home.style-4.style-4')
            @break
            @case(5)
            @include('frontend.src.home.style-5.style-5')
            @break
            @default
            @include('frontend.src.home.style-1.style-1')
        @endswitch
    @endif
@endsection
@section('footer')
    @include('frontend.src.home.script.slider')
@endsection



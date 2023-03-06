@extends('frontend.layout.app')
@section('content')
    <br>
    <br>
    @include('frontend.src.products.single-product.parts.product-general-information')
    @include('frontend.src.products.single-product.parts.product-tabs-area')
    @include('frontend.src.products.single-product.parts.related-products')
@endsection


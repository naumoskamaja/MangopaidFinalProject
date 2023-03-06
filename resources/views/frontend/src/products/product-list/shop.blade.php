@extends('frontend.layout.app')
@section('content')
    @include('frontend.src.products.product-list.parts.title-area')
    <section class="product-area product-shop-inner-area">
        <div class="container">
            <div class="row">
                @include('frontend.src.products.product-list.parts.filters-section')
                @include('frontend.src.products.product-list.parts.products')
            </div>
        </div>
    </section>
    @include('frontend.src.products.product-list.scripts.submit-form')
    @include('frontend.src.products.product-list.css.pagination-style')
@endsection

@section('footer')
    @include('frontend.src.products.product-list.scripts.filter-by-price')
    @include('frontend.src.products.product-list.scripts.quick-view-modal')
@endsection

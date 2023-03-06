<?php $cart_products = \App\Library\PagesHelper::getCartData($page)['cart_products'];
$banner = \App\Library\PagesHelper::getCartData($page)['banner']; ?>
@extends('frontend.layout.app')
@section('content')
    @include('frontend.src.wishlist.parts.title-area')
    @include('frontend.src.wishlist.parts.items')
@endsection

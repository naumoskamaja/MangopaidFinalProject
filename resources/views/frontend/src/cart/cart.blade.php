<?php $cart_products = \App\Library\PagesHelper::getCartData($page)['cart_products'];
$banner = \App\Library\PagesHelper::getCartData($page)['banner']; ?>
@extends('frontend.layout.app')
@section('content')
    @include('frontend.layout.parts.breadcrumb')
    @include('frontend.src.cart.parts.items')
@endsection

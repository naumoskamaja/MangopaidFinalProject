<?php $paragraphs = \App\Library\PagesHelper::getPageAttirbutes($page)['paragraphs'];
$banner = \App\Library\PagesHelper::getPageAttirbutes($page)['banner']; ?>
@extends('frontend.layout.app')
@section('content')
    @include('frontend.layout.parts.breadcrumb')
    @if ($page == 'faq')
        @include('frontend.src.pages.parts.faq')
    @else
        @include('frontend.src.pages.parts.content-area')
    @endif
@endsection

@extends('admin.layout.app')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div>
                        <div class="main-container">
                            <div class="overlay"></div>
                            <div class="search-overlay"></div>
                            @include('admin.src.dashboard.parts.chart_monthly')
                            @include('admin.src.dashboard.parts.donut_cart')
                            @include('admin.src.dashboard.parts.balance')
                            @include('admin.src.dashboard.parts.bestsellers')
                            @include('admin.src.dashboard.parts.recent_orders')
                            @include('admin.layout.footer')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('admin.src.dashboard.script.script')
@endsection

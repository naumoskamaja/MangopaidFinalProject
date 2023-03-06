@extends('admin.layout.app')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <form action="{{url('/admin/coupon/store') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="coupon_id" value="{{$coupon->id ?? 0}}"/>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 mb-4">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <label for="code">
                                                @lang("website.coupon_code")
                                            </label>
                                            <input type="text" name="code" id="code" class="form-control"
                                                   value="{{$coupon->code ?? old('code')}}" required>
                                            @error('code') <span
                                                class="error text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <label for="code">
                                                @lang("website.coupon_type")
                                            </label>
                                            <div class="n-chk">
                                                <label class="new-control new-radio new-radio-text radio-info">
                                                    <input type="radio" class="new-control-input" value="1" name="type"
                                                   @if(isset($coupon) && $coupon->type==1) checked @endif
                                                    >
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-radio-content">%</span>
                                                </label>
                                                <label class="new-control new-radio new-radio-text radio-info">
                                                    <input type="radio" class="new-control-input" value="2" name="type"
                                                           @if(isset($coupon) && $coupon->type==0) checked @endif
                                                    >
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-radio-content">-</span>
                                                </label>
                                                @error('type')
                                                <div class="error text-danger">{{ $message }}</div> @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <label for="value">
                                                @lang("website.value")
                                            </label>
                                            <input type="number" name="value" id="value" class="form-control"
                                                   value="{{$coupon->value ?? old('value')}}" required>
                                            @error('value') <span
                                                class="error text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <label for="start_date">
                                                @lang("website.start_date")
                                            </label>
                                            <input type="date" name="start_date" id="start_date" class="form-control"
                                                   required value="{{$coupon->start_date ?? old('start_date')}}">
                                            @error('start_date') <span
                                                class="error text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <label for="end_date">
                                                @lang("website.end_date")
                                            </label>
                                            <input type="date" name="end_date" id="end_date" class="form-control"
                                                   value="{{$coupon->end_date ?? old('end_date')}}"
                                                   required>
                                            @error('end_date') <span
                                                class="error text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <label for="nr">
                                                @lang("website.no_coupons")
                                            </label>
                                            <input type="number" name="nr" id="nr" class="form-control"
                                                   value="{{$coupon->nr ?? old('nr')}}" required>
                                            @error('nr') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-7 mb-4 custom-file admin-coupon-image-container">
                                    <input class="admin-coupon-image-input" type="file" name="image">
                                    @error('image') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-lg-5 col-md-5 mb-4 custom-file admin-coupon-image-container">
                                    @if(isset($coupon) && $coupon->image!=null)
                                        <img class="height-40" src="{{ asset($coupon->image) }}" alt="icon">
                                        <br/>
                                    @endif
                                </div>

                                <div class="col-12 text-right">
                                    <div class="action-btn align-right mt-40">
                                        <a type="button" href="/admin/coupons"
                                           class="btn btn-outline-info"> @lang("website.cancel") </a>
                                        <button type="submit" class="btn btn-info"> @lang("website.save") </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

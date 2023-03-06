@extends('frontend.layout.app')

@section('content')

    @include('auth.src.authentication.parts.title-area')
    <!--== End Page Title Area ==-->
    <div class="account-login-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 m-auto">

                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <p class="text text-danger text-left">{{ $error }}</p>
                        @endforeach
                    @endif
                    <div class="login-top">
                        <nav class="login-form-nav">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><i class="lastudioicon-user-1"></i>@lang('website.reset_password')</button>
                            </div>
                        </nav>
                    </div>

                    <div class="login-bottom">
                        <div class="login-form-content tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="login-form">
                                    <form class="login-form-wrapper" id="login-form"method="POST" action="{{ route('password.update') }}">
                                        @csrf
                                        <input type="hidden" name="token" value="{{$request->route('token')}}" />
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group" data-validate = "Valid email is required: ex@abc.xyz}">
                                                            <label for="UserName" class="form-label">@lang('website.email_address')</label>
                                                            <input type="email" class="form-control" id="UserName"  name="email" value="{{ $request->email }}" placeholder=">@lang('website.email_adress')" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group" data-validate = "Password is required">
                                                            <label for="UserName" class="form-label">@lang('website.new_password') </label>
                                                            <input  type="password" name="password" class="form-control" id="UserName" required autocomplete="new-password"   >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group" data-validate = "Confirm Password is required">
                                                            <label for="UserName" class="form-label">@lang('website.confirm_new_password')</label>
                                                            <input  type="password" name="password_confirmation" class="form-control" id="UserName" required autocomplete="new-password"   >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-0 form-group-info">
                                                            <button class="btn btn-theme btn-black" type="submit">@lang('website.update') @lang('website.password') </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- Message Notification -->
                                <div class="form-message"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Contact Area ==-->

@endsection


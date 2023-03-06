@extends('frontend.layout.app')
@section('content')
    <!--== Start Title Area ==-->
    @include('auth.src.authentication.parts.title-area')
    <!--== End Page Title Area ==-->
    <!--== Start Register Area ==-->
    <div class="account-login-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 m-auto">
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <p class="text text-danger text-left">{{ $error }}</p>
                        @endforeach
                    @endif
                    <?php
                    $page = 'login';
                    if (Route::current()->getName() == 'register') {
                        $page = 'register';
                    } ?>
                        @include('auth.src.authentication.parts.login-top')
                        <div class="login-bottom">
                        <div class="login-form-content tab-content" id="nav-tabContent">
                            @include('auth.src.authentication.tabs.register-tab')
                            @include('auth.src.authentication.tabs.login-tab')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Register Area ==-->
@endsection

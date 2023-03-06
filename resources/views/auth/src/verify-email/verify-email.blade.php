@extends('frontend.layout.layout')
@section('content')
    @include('auth.src.login_register.title_area')
    <!--== End Page Title Area ==-->
    <div class="account-login-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 m-auto">
                    @if(session('status'))
                        <p class="text text-success text-center">{{ session('status') }}</p>
                    @endif
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <p class="text text-danger text-left">{{ $error }}</p>
                        @endforeach
                    @endif
                    <div class="login-top">
                        <nav class="login-form-nav">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><i class="lastudioicon-user-1"></i>@lang('website.verify_email')</button>
                            </div>
                        </nav>
                    </div>

                    <div class="login-bottom">
                        <div class="login-form-content tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="login-form">
                                    <form class="login-form-wrapper" id="login-form"method="POST" action="{{ route('verification.send') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <p class="text-left m-40-0">@lang('website.thank_you_for_registering')  </p>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group mb-0 form-group-info">
                                                            <button class="btn btn-theme btn-black" type="submit">@lang('website.resend_email')</button>
                                                            <a class="btn-forgot" href="/login">@lang('website.i_already_have_an_account') </a>
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



{{--@extends('auth.layout')--}}
{{--@section('form')--}}


{{--    <div class="page-header section-height-75">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">--}}
{{--                    <div class="card card-plain mt-8">--}}
{{--                        <h1 class="text-center">--}}
{{--                            Modapascher--}}
{{--                        </h1>--}}
{{--                        <p class="text-center">--}}
{{--                            <a href="/logout" class="text-danger">Logout</a>--}}
{{--                        </p>--}}
{{--                        <br />--}}

{{--                        <form method="POST" action="{{ route('verification.send') }}"  class="login100-form validate-form">--}}
{{--                            @csrf--}}
{{--                            <p class="text-center">--}}
{{--                                <strong class="login100-form-title">--}}
{{--                                    E-Mail verifizieren--}}
{{--                                </strong>--}}
{{--                            </p>--}}
{{--                            <p class="text-center">Besten Dank für die Registrierung! Bevor wir weiterfahren können, bitte ich dich dein E-Mail postfach zu überprüfen und deine E-Mail Adresse zu verifizieren, damit wir die Registration erfolgreich abschliessen können. </p>--}}
{{--                            @if(session('status'))--}}
{{--                                <p class="text text-success text-center">{{ session('status') }}</p>--}}
{{--                            @endif--}}
{{--                            @if($errors->any())--}}
{{--                                @foreach ($errors->all() as $error)--}}
{{--                                    <p class="text text-danger text-center">{{ $error }}</p>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}

{{--                            <div class="container-login100-form-btn text-center">--}}
{{--                                <button type="submit" class="btn btn-info">--}}
{{--                                    E-Mail nochmals versenden--}}
{{--                                </button>--}}
{{--                            </div>--}}


{{--                            <div class="text-center p-t-50">--}}
{{--                                <a class="txt2" href="/login">--}}
{{--                                    Ich habe bereits ein Konto--}}
{{--                                    <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-6">--}}
{{--                    <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">--}}
{{--                        <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"--}}
{{--                             style="background-image:url('/assets/auth/images/curved6.jpg')"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    </section>--}}
{{--@endsection--}}

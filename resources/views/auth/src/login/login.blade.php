@extends('frontend.layout.app')
@section('content')
    <!--== Start Title Area ==-->
    @include('auth.src.authentication.parts.title-area')
    <!--== End Title Area ==-->
    <!--== Start Login Area ==-->
    <div class="account-login-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 m-auto">
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <p class="text text-danger text-left">@lang('website.'.$error)</p>
                        @endforeach
                    @endif
                    <?php
                        $page = 'login';
                    if (Route::current()->getName() == 'register' || old('city')) {
                        $page = 'register';
                    } ?>
                    @include('auth.src.authentication.parts.login-top')
                    <div class="login-bottom">
                        <div class="login-form-content tab-content" id="nav-tabContent">
                            @include('auth.src.authentication.tabs.login-tab')
                            @include('auth.src.authentication.tabs.register-tab')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Login Area ==-->

@endsection
@section('footer')
    <script>
        function setCityValueToMainInput(){
            let selectCityInput = document.getElementById('citySelect')
            let cityInput = document.getElementById('city')
            cityInput.value = selectCityInput.value
        }

        function countryChange(){
            let selectCityDiv = document.getElementById('citySelectDiv')
            let cityDiv = document.getElementById('cityDiv')
            let country = document.getElementById('country')
            let selectCityInput = document.getElementById('citySelect')
            let cityInput = document.getElementById('city')
            if(country.value == 'Albania'){
                selectCityInput.value = cityInput.value
                if(selectCityDiv.classList.contains('hidden')){
                    selectCityDiv.classList.remove('hidden')
                    selectCityInput.setAttribute('required','required')
                }
                if(!cityDiv.classList.contains('hidden')){
                    cityDiv.classList.add('hidden')
                    cityInput.removeAttribute('required')
                }
            }else{
                if(!selectCityDiv.classList.contains('hidden')){
                    selectCityDiv.classList.add('hidden')
                    selectCityInput.removeAttribute('required')
                }
                if(cityDiv.classList.contains('hidden')){
                    cityDiv.classList.remove('hidden')
                    cityInput.setAttribute('required','required')
                }
            }
        }
    </script>
@endsection

@extends('profile.layout.app')
@section('content')
    <div class="d-flex flex-row flex-column-fluid container">
        <div class="main d-flex flex-column flex-row-fluid">
            <div class="subheader  subheader-transparent pb-10" id="kt_subheader">
                <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                    <div class="d-flex align-items-center flex-wrap mr-1">

                    </div>
                </div>
            </div>
            <div class="content flex-column-fluid" id="kt_content">
                <div class="d-flex flex-row">
                    @include('profile.src.profile.parts.aside')
                    <div class="flex-row-fluid ml-lg-8">
                        <div class="tab-content" id="nav-tabContent">
                            @include('profile.src.profile.parts.orders')
                            @include('profile.src.profile.parts.account_information')
                            @include('profile.src.profile.parts.change_password')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
            let country = document.getElementById('billing_country')
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
        (function(){
            let tab = '{!! $tab !!}'
            let orderTab = document.getElementById('nav-orders-tab');
            let accountTab = document.getElementById('nav-account-tab');
            if(tab == 'account'){
                accountTab.click()
            }else{
                orderTab.click()
            }
        })()
    </script>
@endsection

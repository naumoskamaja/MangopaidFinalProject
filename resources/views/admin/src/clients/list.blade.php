@extends('admin.layout.app')

@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="row">
                            <div class="col-6">
                                <h4>@lang("website.banners")</h4>
                            </div>
                            <div class="col-6 text-right">
                                <a href="/admin/client/add" class="btn btn-info">+ @lang("website.add_client")</a>
                            </div>
                        </div>
                        <hr />
                        <div>
                            <div class="layout-px-spacing">
                                <div class="row layout-spacing layout-top-spacing" id="cancel-row">
                                    <div class="col-lg-12">
                                        <div class="widget-content searchable-container list">
                                            <form class="w-100" action="" method="GET" id="clients-form">
                                                <div class="row">
                                                    <div class="col-md-12 mb-20">
                                                        <input name="search" placeholder="Search here.." type="text"
                                                               class="form-control"
                                                               value="{{$search}}" onkeyup="submitForm()"
                                                        />
                                                    </div>
                                                </div>
                                            </form>
                                            <hr/>
                                            <div class="searchable-items list">
                                                @foreach($clients as $client)
                                                    <div class="items">
                                                        <div class="item-content">
                                                            <div class="brisi2 col-2">
                                                                <div class="user-profile">
                                                                    <div class="n-chk align-self-center text-center">
                                                                        <label class="new-control new-checkbox checkbox-primary">
                                                                            <input type="checkbox" class="new-control-input contact-chkbox">
                                                                            <span class="new-control-indicator"></span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="user-meta-info">
                                                                        <p class="user-name"
                                                                           data-name="{{$client->first_name}}">{{$client->first_name}}</p>
                                                                        <p class="user-last-name"
                                                                           data-last_name="{{$client->last_name}}">{{$client->last_name}}</p>
                                                                        <p class="user-email"
                                                                           data-email="{{$client->email}}">{{$client->email}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="brisi2 col-2">
                                                                <div class="user-phone">
                                                                    <p class="info-title">@lang("website.phone_number"): </p>
                                                                    <p class="usr-phone text-right"
                                                                       data-phone="{{$client->phone}}">{{$client->phone}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="brisi2 col-2">
                                                                <div class="user-address">
                                                                    <p class="info-title">@lang("website.address"): </p>
                                                                    <p class="usr-address"
                                                                       data-address="{{$client->address}}">{{$client->address}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="brisi1 col-1">
                                                                <div class="user-zip">
                                                                    <p class="info-title">@lang("website.zip"): </p>
                                                                    <p class="usr-zip" data-zip="{{$client->zip}}">{{$client->zip}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="brisi2 col-2">
                                                                <div class="user-city">
                                                                    <p class="info-title">@lang("website.city"): </p>
                                                                    <p class="usr-ph-no" data-city="{{$client->city}}">{{$client->city}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="brisi2 col-2">
                                                                <div class="user-country">
                                                                    <p class="info-title">@lang("website.country"): </p>
                                                                    <p class="usr-ph-no"
                                                                       data-country="{{$client->country}}">{{$client->country}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="action-btn text-right">
                                                                <a href="{{url('/admin/client/'.$client->id.'/archive')}}"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="Archive">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                         height="20" viewBox="0 0 24 24"
                                                                         fill="none" stroke="currentColor" stroke-width="2"
                                                                         stroke-linecap="round"
                                                                         stroke-linejoin="round"
                                                                         class="feather feather-trash-2">
                                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                                        <path
                                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center text-center">
                                    {!! $clients->appends(Request::except('page'))->render('pagination') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function submitForm(){
            document.getElementById('clients-form').submit();
        }
    </script>

@endsection

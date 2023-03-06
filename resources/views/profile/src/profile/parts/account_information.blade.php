<style>
    .hidden {
        display: none;
    }
</style>
<div class="tab-pane fade" id="accountInfos" role="tabpanel" aria-labelledby="nav-orders-tab">
    <div class="card card-custom">
        <div class="card-header py-3" style="justify-content: center;">
            <div class="card-title align-items-start flex-column">
                <h3 class="card-label font-weight-bolder text-dark">@lang('website.account_information')</h3>
                <span
                    class="text-muted font-weight-bold font-size-sm mt-1">@lang('website.change_account_settings') </span>
            </div>
        </div>
        <form action="/profile" method="post" class="form">
            @csrf
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
            @if(session('success'))
                <div class="alert alert-success">{!! session('success') !!}</div>
            @endif
            <div class="card-body">
                @if(session('successAccount'))
                    <div class="alert alert-custom alert-light-success fade show " role="alert">
                        <div class="alert-icon">
                            <span class="svg-icon svg-icon-3x svg-icon-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                                     version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"></circle>
                                        <rect fill="#000000" x="11" y="10" width="2" height="7" rx="1"></rect>
                                        <rect fill="#000000" x="11" y="7" width="2" height="2" rx="1"></rect>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </div>
                        <div
                            class="alert-text font-weight-bold">  @lang('website.profile_information_updated_successfully')
                        </div>
                        <div class="alert-close">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">
                                    <i class="ki ki-close"></i>
                                </span>
                            </button>
                        </div>
                    </div>

                @endif
                @if(session('successPassword'))
                    <div class="alert alert-custom alert-light-success fade show " role="alert">
                        <div class="alert-icon">
                            <span class="svg-icon svg-icon-3x svg-icon-success">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Info-circle.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                                     version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"></circle>
                                        <rect fill="#000000" x="11" y="10" width="2" height="7" rx="1"></rect>
                                        <rect fill="#000000" x="11" y="7" width="2" height="2" rx="1"></rect>
                                    </g>
                                </svg>
                            </span>
                        </div>
                        <div class="alert-text font-weight-bold">@lang('website.password_has_been_changed_successfully')
                        </div>
                        <div class="alert-close">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">
                                    <i class="ki ki-close"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                @endif
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif
                <div class="form-group row">
                    <label
                        class="col-xl-3 col-lg-3 col-md-6 col-form-label d-block d-md-none align-left">@lang('website.first_name')</label>
                    <label
                        class="col-xl-3 col-lg-3 col-md-6 col-form-label d-none d-md-block">@lang('website.first_name')</label>

                    <div class="col-lg-9 col-xl-9 col-md-6">
                        <div class="input-border">
                            <input class="form-control form-control-lg form-control-solid" type="text" name="first_name"
                                   value="{!! $client->first_name !!} "/>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label
                        class="col-xl-3 col-lg-3 col-md-6 col-form-label d-block d-md-none align-left">@lang('website.last_name')</label>
                    <label
                        class="col-xl-3 col-lg-3 col-md-6 col-form-label d-none d-md-block">@lang('website.last_name')</label>

                    <div class="col-lg-9 col-xl-9 col-md-6">
                        <div class="input-border">
                            <input class="form-control form-control-lg form-control-solid" type="text" name="last_name"
                                   value="{!! $client->last_name !!} "/>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label
                        class="col-xl-3 col-lg-3 col-md-6 col-form-label d-block d-md-none align-left">@lang('website.email_address')</label>
                    <label
                        class="col-xl-3 col-lg-3 col-md-6 col-form-label d-none d-md-block">@lang('website.email_address')</label>
                    <div class="col-lg-9 col-xl-9 col-md-6">
                        <div class="input-group input-group-lg input-group-solid input-border">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-at"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control form-control-lg form-control-solid"
                                   value="{!! $client->email !!}" name="email" placeholder="Email"/>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label
                        class="col-xl-3 col-lg-3 col-md-6 col-form-label d-block d-md-none align-left">@lang('website.address')</label>
                    <label
                        class="col-xl-3 col-lg-3 col-md-6 col-form-label d-none d-md-block">@lang('website.address')</label>
                    <div class="col-lg-9 col-xl-9 col-md-6">
                        <div class="input-border">
                            <input class="form-control form-control-lg form-control-solid" type="text" name="address"
                                   value="{!! $client->address !!}"/>
                        </div>
                    </div>
                </div>
                <div class="form-group row" id="cityDiv">
                    <label
                        class="col-xl-3 col-lg-3 col-md-6 col-form-label d-block d-md-none align-left">@lang('website.city')</label>
                    <label
                        class="col-xl-3 col-lg-3 col-md-6 col-form-label d-none d-md-block">@lang('website.city')</label>
                    <div class="col-lg-9 col-xl-9 col-md-6">
                        <div class="">
                            <input class="form-control form-control-lg form-control-solid" type="text" name="city"
                                   id="city"
                                   required value="{!! $client->city !!} "/>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label
                        class="col-xl-3 col-lg-3 col-md-6 col-form-label d-block d-md-none align-left">@lang('website.zip')</label>
                    <label
                        class="col-xl-3 col-lg-3 col-md-6 col-form-label d-none d-md-block">@lang('website.zip')</label>
                    <div class="col-lg-9 col-xl-9 col-md-6">
                        <div class="input-border">
                            <input class="form-control form-control-lg form-control-solid" type="text"
                                   value="{!! $client->zip !!}" name="zip"/>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label
                        class="col-xl-3 col-lg-3 col-md-6 col-form-label d-block d-md-none align-left">@lang('website.phone_number')</label>
                    <label
                        class="col-xl-3 col-lg-3 col-md-6 col-form-label d-none d-md-block">@lang('website.phone_number')</label>
                    <div class="col-lg-9 col-xl-9 col-md-6">
                        <div class="input-border">
                            <input class="form-control form-control-lg form-control-solid" type="text"
                                   value="{!! $client->phone !!}" name="phone"/>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label
                        class="col-xl-3 col-lg-3 col-md-6 col-form-label d-block d-md-none align-left">@lang('website.country')</label>
                    <label
                        class="col-xl-3 col-lg-3 col-md-6 col-form-label d-none d-md-block">@lang('website.country')</label>
                    <div class="col-lg-9 col-xl-9 col-md-6 ">
                        <div class="input-border">
                            <select name="country" class="form-control form-control-lg form-control-solid "
                                    id="country">
                                <option value="">@lang("website.select_country")</option>
                                @php $countries = \App\Library\ConstHelper::COUNTRIES @endphp
                                @foreach($countries  as $key=>$item)
                                    <option value="{{$item}}"
                                            @if($client->country==$item) selected @endif
                                    >{{$item}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group row" style="float:right;">
                    <button type="submit"
                            class="btn btn-light-success mr-2 profile-button">@lang('website.save_changes')  </button>
                </div>
            </div>
        </form>
    </div>
</div>
<style>
    .input-border {
        border-bottom: 1px solid #e8e8e8 !important;
    }
</style>

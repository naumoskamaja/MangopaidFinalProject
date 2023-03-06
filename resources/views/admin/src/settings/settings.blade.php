@extends('admin.layout.app')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing p-0">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div>
                    <div class="account-settings-container layout-top-spacing">
                        <div class="account-content">
                            <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll"
                                 data-offset="-100">
                                <form action="{{url('/admin/profile/settings')}}" method="post"
                                      enctype="multipart/form-data" id="general-info" class="row">
                                    @csrf
                                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                        <div class="info general-info">
                                            <h5>General Information</h5>
                                            <div class="row">
                                                <div class="col-lg-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-xl-2 col-lg-12 col-md-4">
                                                            <div class="upload mt-4 pr-md-4">
                                                                @if($image!=null)
                                                                    <a href="/admin/profile/settings/delete_logo"
                                                                       type="button"
                                                                       class="btn btn-outline-info btn-sm w-100 mb-10">
                                                                        Remove
                                                                    </a>
                                                                    <img src="{{asset($image) }}" class="w-100"/>
                                                                @endif
                                                                <input class="form-control settings-image"
                                                                       type="file" name="image">
                                                                @error('image') <span
                                                                    class="error text-danger">{{ $message }}</span> @enderror

                                                            </div>
                                                        </div>
                                                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                            <div class="form">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="company_name">@lang("website.company_name")</label>
                                                                            <input type="text" name="company_name"
                                                                                   class="form-control mb-4"
                                                                                   value="{{$conf->company_name ?? old('company_name')}}"
                                                                                   id="company_name" required>
                                                                            @error('company_name') <span
                                                                                class="error text-danger">{{ $message }}</span> @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label
                                                                            for="email">@lang("website.contact_email")</label>
                                                                        <input type="text" name="email"
                                                                               class="form-control mb-4"
                                                                               id="email"
                                                                               value="{{$conf->email ?? old('email')}}">
                                                                        @error('email') <span
                                                                            class="error text-danger">{{ $message }}</span> @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="tel">@lang("website.phone_number")</label>
                                                                            <input type="text" name="phone"
                                                                                   value="{{$conf->phone ?? old('phone')}}"
                                                                                   class="form-control mb-4" id="tel">
                                                                            @error('phone') <span
                                                                                class="error text-danger">{{ $message }}</span> @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label
                                                                            for="address">@lang("website.address")</label>
                                                                        <input type="text" name="address"
                                                                               value="{{$conf->address ?? old('address')}}"
                                                                               class="form-control mb-4" id="address">
                                                                        @error('address') <span
                                                                            class="error text-danger">{{ $message }}</span> @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                        <div class="info general-info">
                                            <h5 class="">Social</h5>
                                            <div class="row">
                                                <div class="col-md-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="input-group social-fb mb-3">
                                                                <div class="input-group-prepend mr-3">
                                                    <span class="input-group-text" id="fb"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-facebook"><path
                                                                d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg></span>

                                                                </div>
                                                                <input type="text" class="form-control"
                                                                       placeholder="Facebook Username"
                                                                       aria-label="Facebook" aria-describedby="fb"
                                                                       name="facebook"
                                                                       value="{{$conf->facebook ?? old('facebook')}}">
                                                                @error('facebook') <span
                                                                    class="error text-danger">{{ $message }}</span> @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="input-group social-github mb-3">
                                                                <div class="input-group-prepend mr-3">
                                                <span class="input-group-text" id="github">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-instagram"><rect x="2" y="2" width="20"
                                                                                                 height="20" rx="5"
                                                                                                 ry="5"></rect><path
                                                            d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line
                                                            x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                                                </span>
                                                                </div>
                                                                <input type="text" class="form-control"
                                                                       placeholder="Instagram"
                                                                       aria-label="Instagram"
                                                                       aria-describedby="instagram"
                                                                       name="instagram"
                                                                       value="{{$conf->instagram ?? old('instagram')}}"
                                                                >
                                                                @error('instagram') <span
                                                                    class="error text-danger">{{ $message }}</span> @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="info general-info">
                                            <div class="col-12 text-right">
                                                <div class="action-btn align-right mt-40">
                                                    <a type="button" href="/admin"
                                                       class="btn btn-outline-info"> @lang("website.cancel") </a>
                                                    <button type="submit"
                                                            class="btn btn-info"> @lang("website.save") </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

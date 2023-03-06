@extends('admin.layout.app')

@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="row">
                            <div class="col-12">
                                <h4>@lang("website.add_client")</h4>
                            </div>
                        </div>
                        <hr/>
                        <div>
                            <form action="{{url('/admin/client/store') }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{$client->id ?? 0}}" name="client_id"/>
                                <div class="row w-100 mb-20">
                                    <div class="col-md-4">
                                        <label for="first_name">@lang("website.first_name")</label>
                                        <input type="text" class="form-control"
                                               placeholder="@lang("website.first_name")"
                                               value="{{$client->first_name ?? old('first_name')}}"
                                               name="first_name">
                                        @error('first_name') <span
                                            class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="first_name">@lang("website.last_name")</label>
                                        <input type="text" class="form-control" placeholder="@lang("website.last_name")"
                                               value="{{$client->last_name ?? old('last_name')}}" name="last_name">
                                        @error('last_name') <span
                                            class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-8">
                                        <label for="email">@lang("website.email")</label>
                                        <input type="email" class="form-control" placeholder="@lang("website.email")"
                                               name="email"
                                               value="{{$client->email ?? old('email')}}">
                                        @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone">@lang("website.phone_number")</label>
                                        <input type="text" class="form-control"
                                               placeholder="@lang("website.phone_number")"
                                               value="{{$client->phone ?? old('phone')}}" name="phone">
                                        @error('phone') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-7">
                                        <label for="address">@lang("website.address")</label>
                                        <input type="text" class="form-control" placeholder="@lang("website.address")"
                                               name="address"
                                               value="{{$client->address ?? old('address')}}">
                                        @error('address') <span
                                            class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label for="zip">@lang("website.zip")</label>
                                        <input type="text" class="form-control" placeholder="@lang("website.zip")"
                                               name="zip"
                                               value="{{$client->zip ?? old('zip')}}">
                                        @error('zip') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label for="city">@lang("website.city")</label>
                                        <input type="text" class="form-control" placeholder="@lang("website.city")"
                                               name="city"
                                               value="{{$client->city ?? old('city')}}">
                                        @error('city') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="country">@lang("website.country")</label>
                                        <input type="text" class="form-control" placeholder="@lang("website.country")"
                                               name="country"
                                               value="{{$client->country ?? old('country')}}">
                                        @error('country') <span
                                            class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <hr/>
                                <div class="col-12 text-right">
                                    <div class="action-btn align-right mt-40">
                                        <a type="button" href="/admin/clients"
                                           class="btn btn-outline-info"> @lang("website.cancel") </a>
                                        <button type="submit" class="btn btn-info"> @lang("website.save") </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

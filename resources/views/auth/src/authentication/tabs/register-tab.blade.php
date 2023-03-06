@php
    $cities = ['Tiranë Qendër','Tiranë Rrethina','Bajram Curri','Bajzë','Bushat','Ballsh','Berat','Bilisht','Bulqizë','Burrel','Belsh','Cërrik','Çorovodë','Delvinë','Divjakë','Durrës','Elbasan','Ersekë','Fier','Fierzë','Finiq','Fushë - Arrëz','Fushë - Krujë','Gjirokastër','Gramsh','Himarë','Kamëz','Kavajë','Këlcyrë','Klos','Konispol','Koplik','Korçë','Korçë','Krrabë','Krujë','Krumë','Kuçovë','Kukës','Laç','Leskovik','Lezhë','Libohovë','Librazhd','Lushnjë','Maliq','Mamurras','Manëz','Memaliaj','Milot','Orikum','Patos','Peqin','Përmet','Peshkopi','Pogradec','Poliçan','Prrenjas','Pukë','Reps','Roskovec','Rrëshen','Rrogozhinë','Rubik','Sarandë','Selenicë','Shëngjin','Shijak','Shkodër','Sukth','Tepelenë','Ulëz','Ura Vajgurore','Vau i Dejës','Vlorë','Velipoje',];
@endphp
<style>
    .hidden {
        display: none;
    }
</style>
<div class="tab-pane fade @if($page=='register') show active @endif" id="nav-register" role="tabpanel"
     aria-labelledby="nav-register-tab">
    <div class="login-form">
        <form class="login-form-wrapper" id="register-form" method="POST" action="{{ route('register') }}">
            @csrf
            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">@lang('website.'.$error)</p>
                @endforeach
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="RegUserName" class="form-label">@lang("website.first_name") *</label>
                                <input name="first_name" type="text" class="form-control" id="RegUserName"
                                       placeholder="@lang("website.first_name")"
                                       value="{{ old('first_name') }}"
                                       required autocomplete="name" autofocus>
                                @error('first_name')
                                <p class="text text-danger text-center">@lang('website.'.$message)</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="RegUserLastName" class="form-label">@lang("website.last_name") *</label>
                                <input name="last_name" type="text" class="form-control" id="RegUserLastName"
                                       placeholder="@lang("website.last_name")"
                                       value="{{ old('last_name') }}"
                                       required autocomplete="last_name" autofocus>
                                @error('last_name')
                                <p class="text text-danger text-center">@lang('website.'.$message)</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email" class="form-label mt-15">@lang("website.email") *</label>
                                <input name="email" type="email" class="form-control" id="email"
                                       placeholder="@lang("website.email")"
                                       value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <p class="text text-danger text-center">@lang('website.'.$message)</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="phone" class="form-label mt-15">@lang("website.phone") *</label>
                                <input name="phone" type="text" class="form-control" id="phone"
                                       placeholder="@lang("website.phone_number")"
                                       value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                @error('phone')
                                <p class="text text-danger text-center">@lang('website.'.$message)</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address" class="form-label mt-15">@lang("website.address") *</label>
                                <input name="address" type="text" class="form-control" id="address"
                                       placeholder="@lang("website.address")"
                                       value="{{ old('address') }}" required autocomplete="address" autofocus>
                                @error('address')
                                <p class="text text-danger text-center">@lang('website.'.$message)</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="zip" class="form-label mt-15">@lang("website.zip") *</label>
                                <input name="zip" type="text" class="form-control" id="zip"
                                       placeholder="@lang("website.zip")"
                                       value="{{ old('zip') }}" required autocomplete="zip" autofocus>
                                @error('zip')
                                <p class="text text-danger text-center">@lang('website.'.$message)</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" id="cityDiv">
                                <label for="city" class="form-label mt-15">@lang("website.city") *</label>
                                <input name="city" type="text" class="form-control" id="city"
                                       placeholder="@lang("website.city")"
                                       value="{{ old('city') }}" required autocomplete="city" autofocus>
                                @error('city')
                                <p class="text text-danger text-center">@lang('website.'.$message)</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="country" class="form-label mt-15">@lang("website.country") *</label>
                                <select name="country" class="form-control" id="country">
                                    <option value="">@lang("website.select_country")</option>
                                    @php $countries = \App\Library\ConstHelper::COUNTRIES @endphp
                                    @foreach($countries  as $key=>$item)
                                        <option value="{{$item}}"
                                                @if(old('country')==$item) selected @endif
                                        >{{$item}}</option>
                                    @endforeach
                                </select>
                                @error('country')
                                <p class="text text-danger text-center">@lang('website.'.$message)</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <i class="fa fa-eye" onclick="showPasswordInput(event, 'regpassword')"></i> <label
                                    for="regpassword" class="form-label mt-15">@lang("website.password") * </label>
                                <input name="password" type="password" class="form-control" id="regpassword"
                                       placeholder="********"
                                       value="{{ old('password') }}" required autocomplete="password" autofocus>
                                @error('password')
                                <p class="text text-danger text-center">@lang('website.'.$message)</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <i class="fa fa-eye" onclick="showPasswordInput(event, 'password_confirmation')"></i>
                                <label for="password_confirmation"
                                       class="form-label mt-15">@lang("website.confirm-password") * </label>
                                <input name="password_confirmation" type="password" class="form-control"
                                       id="password_confirmation"
                                       placeholder="********"
                                       value="{{ old('password_confirmation') }}" required
                                       autocomplete="password_confirmation" autofocus>
                                @error('password_confirmation')
                                <p class="text text-danger text-center">@lang('website.'.$message)</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <p>@lang('website.register-form-description')</p>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-0 form-group-info">
                                    <button class="btn btn-theme btn-black"
                                            type="submit">@lang('website.register')</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

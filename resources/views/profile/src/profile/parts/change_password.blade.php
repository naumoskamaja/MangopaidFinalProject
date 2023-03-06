<div class="tab-pane fade" id="nav-changePassword" role="tabpanel" aria-labelledby="nav-changePassword-tab">
    <div class="card card-custom">
        <form class="form" method="POST" action="/changePassword">
            <div class="card-body">
                @csrf
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif
                @if(session('success'))
                    <div class="alert alert-success">{!! session('success') !!}</div>
            @endif
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-md-6 col-form-label d-block d-md-none align-left">@lang('website.current_password')</label>
                    <label class="col-xl-3 col-lg-3 col-md-6 col-form-label d-none d-md-block">@lang('website.current_password')</label>
                    <div class="col-lg-9 col-md-6 col-xl-9">
                        <input type="password" class="form-control form-control-lg form-control-solid mb-2" value=""
                               name="password" placeholder="@lang('website.current_password')" required/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-md-6 col-form-label d-block d-md-none align-left">@lang('website.new_password')</label>
                    <label class="col-xl-3 col-lg-3 col-md-6 col-form-label d-none d-md-block">@lang('website.new_password')</label>
                    <div class="col-lg-9 col-xl-9 col-md-6 ">
                        <input type="password" class="form-control form-control-lg form-control-solid" value=""
                               name='new_password' placeholder="@lang('website.new_password')" required/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-md-6 col-form-label d-block d-md-none align-left">@lang('website.verify_password')</label>
                    <label class="col-xl-3 col-lg-3 col-md-6 col-form-label d-none d-md-block">@lang('website.verify_password')</label>
                    <div class="col-lg-9 col-md-6 col-xl-9">
                        <input type="password" class="form-control form-control-lg form-control-solid" value=""
                               name="confirm_password" placeholder="@lang('website.verify_password')" required/>
                    </div>
                </div>
                <div class="form-group row" style="float:right;">
                    <button type="submit"
                            class="btn btn-light-success mr-2 profile-button">@lang('website.save_changes') </button>
                </div>
            </div>
        </form>
    </div>
</div>

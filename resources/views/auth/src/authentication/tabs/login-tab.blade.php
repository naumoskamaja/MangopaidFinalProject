<div class="tab-pane fade @if($page=='login') show active @endif" id="nav-login" role="tabpanel" aria-labelledby="nav-login-tab">
    <div class="login-form">
        <form class="login-form-wrapper" id="login-form" method="post" action="{{ route('login') }}">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="UserName" class="form-label">@lang('website.email') *</label>
                                <input type="email" class="form-control" id="UserName" name="email">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-0">
                                <i class="fa fa-eye" style="cursor: pointer" onclick="showPasswordInput(event,'password')"></i> <label for="password" class="form-label mt-15">@lang('website.password') * </label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mt-15" style="padding-left:25px;">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">@lang('website.remember_me')</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-0 form-group-info">
                                <button class="btn btn-theme btn-black" type="submit">@lang('website.login')</button>
                            </div>
                        </div>
                        <div class="col-md-12" style="display: flex;justify-content: space-between;">
                            <a class="btn-forgot" href="/forgot-password">@lang('website.lost_your_password')?</a>
                            <div class="btn-terms-group">
                                <a class="btn-terms" href="/terms">@lang('website.terms-and-conditions')</a>
                                &
                                <a class="btn-terms" href="/privacy">@lang('website.privacy_policy') </a>
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
<style>
    .btn-forgot, .btn-terms-group, .btn-terms{
        font-size: 12px !important;
    }
    .btn-forgot{
        text-decoration: underline !important;

    }
</style>

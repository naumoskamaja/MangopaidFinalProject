<div class="login-top">
    <nav class="login-form-nav">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link @if($page=='login') active @endif" id="nav-login-tab" data-bs-toggle="tab" data-bs-target="#nav-login"
                    type="button" role="tab" aria-controls="nav-login" aria-selected="true"><i
                    class="lastudioicon-user-1"></i>@lang('website.login')
            </button>
            <button class="nav-link nav-register @if($page=='register') active @endif" id="nav-register-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-register" type="button" role="tab" aria-controls="nav-register"
                    aria-selected="false"><i class="lastudioicon-user-2"></i>@lang('website.register')
            </button>
        </div>
    </nav>
</div>

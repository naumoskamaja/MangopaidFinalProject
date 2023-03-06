<div id="kt_header" class="header flex-column header-fixed">
    <div class="header-top" style="background: #fff;">
        <div class="container">
            <div class="d-none d-lg-flex align-items-center mr-3">
                <a href="/" class="mr-20">
                    <img alt="Logo"
                         src="@if(isset($conf->logo)){{asset($conf->logo)}} @else /assets/profile/media/logos/logo-letter-12.png @endif"
                         class="max-h-40px"/>
                </a>
            </div>
        </div>
    </div>
    <div class="header-bottom" id="kt_header_bottom">
        <div class="container my-profile-title-container">
            <ul class="header-tabs nav flex-column-auto" role="tablist">
                <li class="nav-item">
                    <a href="#" class="nav-link active" data-toggle="tab" data-target="#kt_header_tab_1" role="tab">
                        <span class="nav-title text-uppercase"> @lang('website.my_account') </span>
                        <span
                            class="nav-desc"> @lang('website.account_information') &amp; @lang('website.orders')</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

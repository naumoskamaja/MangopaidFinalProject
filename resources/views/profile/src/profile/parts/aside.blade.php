<div class="flex-row-auto offcanvas-mobile w-300px w-xl-350px" id="kt_profile_aside">
    <!--begin::Profile Card-->
    <div class="card card-custom card-stretch">
        <div class="card-body pt-4">
            <div class="d-flex align-items-center">
                <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                    <div class="symbol-label" style="background: #ededed; border-radius: 100%;"><i
                            class="flaticon2-user-outline-symbol  icon-lg"></i></div>
                </div>
                <div>
                    <a class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">{{$client->name}} {{$client->lastname}}</a>
                </div>
                <div class=" d-lg-none" style="font-weight: bold; font-size:x-large; margin-left:auto"
                     onclick="changeTab('remove')"><i class="flaticon-close icon-xl"></i></div>
            </div>
            <div class="py-9">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="font-weight-bold mr-2">@lang('website.email'):</span>
                    <span class="text-muted">{{$client->email}}</span>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="font-weight-bold mr-2">@lang('website.phone'):</span>
                    <span class="text-muted">{{$client->phone}}</span>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="font-weight-bold mr-2">@lang('website.location'):</span>
                    <span class="text-muted">{{$client->city}}</span>
                </div>
            </div>
            <div class="navi navi-bold navi-hover navi-active navi-link-rounded" id="nav-tab" role="tablist">
                <div class="navi-item mb-2">
                    <a class="navi-link my-tabs active" style="padding: 0.75rem 0 !important;" onclick="changeTab('orders')" id="nav-orders-tab" data-toggle="tab"
                       href="#nav-orders" role="tab" aria-controls="nav-orders">
                        <span class="navi-icon mr-2">
                            <span class="svg-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                                     version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5"/>
                                        <path
                                            d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L12.5,10 C13.3284271,10 14,10.6715729 14,11.5 C14,12.3284271 13.3284271,13 12.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z"
                                            fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg>
                            </span>
                        </span>
                        <span class="navi-text">@lang('website.orders')</span>
                    </a>
                </div>
                <div class="navi-item mb-2">
                    <a href="#" class="navi-link py-4 my-tabs" onclick="changeTab('account')" id="nav-account-tab" data-toggle="tab"
                       data-target="#accountInfos" role="tab" style="padding: 0.75rem 0 !important;" aria-selected="false">
                        <span class="navi-icon mr-2">
                            <span class="svg-icon">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                                     version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path
                                            d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                            fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        <path
                                            d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                            fill="#000000" fill-rule="nonzero"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </span>
                        <span class="navi-text font-size-lg">@lang('website.account_information')</span>
                    </a>
                </div>
                <div class="navi-item mb-2">
                    <a class="navi-link my-tabs" onclick="changeTab('password')" id="nav-changePassword-tab"
                       data-toggle="tab" href="#nav-changePassword" style="padding: 0.75rem 0 !important;" role="tab" aria-controls="nav-changePassword"
                       aria-selected="true">
                        <span class="navi-icon mr-2">
                            <span class="svg-icon">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Shield-user.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                                     version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path
                                            d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                            fill="#000000" opacity="0.3"/>
                                        <path
                                            d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z"
                                            fill="#000000" opacity="0.3"/>
                                        <path
                                            d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"
                                            fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg>
                            </span>
                        </span>
                        <span class="navi-text font-size-lg">@lang('website.change_password')</span>

                    </a>
                </div>
                <div class="navi-item mb-2">
                    <a class="navi-link my-tabs" style="padding: 0.75rem 0 !important;" href="/logout">
                        <span class="navi-icon mr-2" >
                            <span class="svg-icon">
                            </span>
                        </span>
                        <span class="navi-text font-size-lg">@lang('website.logout')</span>
                    </a>
                </div>
                <div class="navi-item mb-2">
                    <a class="navi-link my-tabs" href="/" style="padding: 0.75rem 0 !important;">
                        <span class="navi-icon mr-2">
                            <span class="svg-icon">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                                   version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path
                                            d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z"
                                            fill="#000000"/>
                                    </g>
                                </svg>
                            </span>
                        </span>
                        <span class="navi-text font-size-lg">@lang('website.home')</span>

                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--end::Profile Card-->
</div>
<div id="overlay-id" class="" onclick="changeTab('remove')"></div>

<!--  BEGIN NAVBAR  -->
<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm m-0">
        <ul class="navbar-item theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a href="/">{{$conf->company_name ?? 'Mangopaid'}}</a>
            </li>
        </ul>
        <ul class="navbar-item flex-row ml-md-auto">
            <li class="nav-item dropdown user-profile-dropdown">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user text-white" id="userProfileDropdown"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    {{auth()->user()->first_name}} &nbsp;&nbsp;
                    <span><i class="flaticon-user"></i></span>
                </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                    <div class="">
                        <div class="dropdown-item">
                            <a class="" href="/admin/profile">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                @lang("website.my_profile")
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a class="" href="/admin/profile/settings">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-lock"
                                >
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                                @lang("website.settings")
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a class="" href="/admin/shipping">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-lock"
                                >
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                                @lang("website.manage_shipping_info")
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a class="" href="/admin/company_info">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-lock"
                                >
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                                @lang("website.shop_information")
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a class="" href="/admin/customization">

                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-aperture">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="14.31" y1="8" x2="20.05" y2="17.94"></line>
                                    <line x1="9.69" y1="8" x2="21.17" y2="8"></line>
                                    <line x1="7.38" y1="12" x2="13.12" y2="2.06"></line>
                                    <line x1="9.69" y1="16" x2="3.95" y2="6.06"></line>
                                    <line x1="14.31" y1="16" x2="2.83" y2="16"></line>
                                    <line x1="16.62" y1="12" x2="10.88" y2="21.94"></line>
                                </svg>
                                <span class="icon-name"> @lang("website.customization")</span>

                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a class="" href="/logout">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-log-out">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                @lang("website.sign_out")
                            </a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </header>
</div>

<!--  END NAVBAR  -->
<!--  BEGIN NAVBAR  -->

<div class="sub-header-container">
    <header class="header navbar navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-menu">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </a>
        <ul class="navbar-nav flex-row">
            <li>
                <div class="page-header">
                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Administration</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>
                                    @if(isset($page) && $page!=null)
                                        @lang('website.'.$page)
                                    @endif
                                </span>
                            </li>
                        </ol>
                    </nav>
                </div>
            </li>
        </ul>
    </header>
</div>
<!--  END NAVBAR  -->
<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">
    <div class="overlay"></div>
    <div class="search-overlay"></div>
    <!--  BEGIN SIDEBAR  -->
    <div class="sidebar-wrapper sidebar-theme">
        <nav id="sidebar">
            <div class="shadow-bottom"></div>
            <ul class="list-unstyled menu-categories" id="accordionExample">
                <li class="menu">
                    <a href="/admin" id="dashboard" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            <span>@lang("website.dashboard")</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a href="#productsNavigation" id="products"
                       @if(\Illuminate\Support\Str::contains(request()->url(),'/product')) aria-expanded="true"
                       class="dropdown-toggle" @else aria-expanded="false" class="dropdown-toggle collapsed" @endif
                       data-toggle="collapse">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-cpu">
                                <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                                <rect x="9" y="9" width="6" height="6"></rect>
                                <line x1="9" y1="1" x2="9" y2="4"></line>
                                <line x1="15" y1="1" x2="15" y2="4"></line>
                                <line x1="9" y1="20" x2="9" y2="23"></line>
                                <line x1="15" y1="20" x2="15" y2="23"></line>
                                <line x1="20" y1="9" x2="23" y2="9"></line>
                                <line x1="20" y1="14" x2="23" y2="14"></line>
                                <line x1="1" y1="9" x2="4" y2="9"></line>
                                <line x1="1" y1="14" x2="4" y2="14"></line>
                            </svg>
                            <span>@lang("website.products")</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled @if(\Illuminate\Support\Str::contains(request()->url(),'/product')) show @endif "
                        id="productsNavigation" data-parent="#accordionExample">
                        <li>
                            <a href="/admin/product/new"> @lang("website.new_product") </a>
                        </li>
                        <li>
                            <a href="/admin/products"> @lang("website.product_list") </a>
                        </li>
                    </ul>
                </li>
                <li class="menu">
                    <a href="/admin/orders" id="orders" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg version="1.0" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-clipboard"
                                 xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                 viewBox="0 0 512.000000 512.000000">
                                <polyline points="9 18 15 12 9 6"></polyline>
                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#506690">
                                    <path
                                        d="M2371 5100 c-150 -40 -306 -141 -387 -248 l-35 -48 -492 -58 c-271 -32 -501 -63 -512 -69 -31 -16 -44 -39 -45 -75 0 -32 54 -516 64 -573 5 -25 3 -27 -44 -31 -27 -3 -56 -11 -65 -18 -9 -7 -78 -117 -155 -245 l-139 -232 -86 -1660 c-47 -913 -85 -1692 -85 -1730 0 -60 3 -73 23 -91 l23 -22 2125 0 2126 0 21 23 c18 19 22 35 22 92 0 37 -38 815 -85 1728 l-86 1660 -139 232 c-77 128 -147 238 -156 246 -11 9 -49 15 -106 18 -86 3 -90 4 -84 25 3 11 18 74 33 138 29 128 26 152 -19 182 -13 8 -190 54 -393 101 -204 47 -380 90 -391 94 -14 6 -24 22 -28 45 -11 60 -92 208 -153 281 -76 91 -209 181 -324 220 -73 25 -102 29 -219 32 -111 2 -148 -1 -209 -17z m318 -176 c139 -34 279 -140 353 -265 21 -34 36 -64 34 -66 -2 -2 -51 8 -110 22 -113 28 -152 27 -180 -4 -8 -9 -34 -96 -56 -192 -23 -95 -43 -182 -46 -191 -4 -14 -72 -44 -80 -35 -1 1 -19 139 -39 306 -19 167 -40 311 -44 320 -21 39 -55 45 -163 33 -56 -7 -103 -10 -106 -7 -8 8 127 68 183 81 72 18 178 17 254 -2z m-329 -258 c0 -2 14 -117 30 -256 17 -139 27 -256 23 -260 -4 -4 -190 -51 -413 -104 -308 -74 -410 -102 -427 -118 -31 -29 -30 -70 7 -220 17 -67 30 -128 30 -135 0 -10 -45 -13 -203 -13 l-203 0 -56 478 c-31 262 -56 478 -55 478 1 1 283 36 627 77 344 41 628 75 633 76 4 0 7 -1 7 -3z m1105 -357 c242 -56 444 -105 449 -110 6 -5 -20 -134 -64 -324 l-74 -315 -246 0 -246 0 -82 343 c-72 301 -85 345 -107 365 -31 26 -65 28 -147 6 -33 -8 -61 -14 -63 -12 -1 2 7 42 18 89 l20 86 51 -13 c28 -7 249 -58 491 -115z m-495 -226 c0 -5 27 -120 60 -257 33 -136 60 -252 60 -257 0 -5 -276 -9 -643 -9 l-642 0 -28 117 c-15 64 -26 117 -24 119 2 1 1194 291 1210 293 4 0 7 -2 7 -6z m-1980 -282 c0 -9 14 -119 25 -203 l5 -38 -100 0 c-55 0 -100 3 -100 6 0 18 145 244 156 244 8 0 14 -4 14 -9z m3239 -110 c39 -66 71 -122 71 -125 0 -3 -74 -6 -165 -6 -91 0 -165 3 -165 8 0 4 12 60 27 125 l27 117 67 0 66 0 72 -119z m155 -373 c3 -35 40 -733 81 -1553 41 -820 76 -1511 78 -1537 l4 -48 -1987 0 -1987 0 4 48 c2 26 37 717 78 1537 41 820 78 1518 81 1553 l6 62 1818 0 1818 0 6 -62z"/>
                                    <path
                                        d="M1850 3209 c-168 -32 -260 -248 -169 -395 24 -39 82 -92 114 -104 23 -9 23 -10 27 -242 4 -223 5 -236 32 -313 85 -248 285 -432 534 -492 88 -21 256 -21 344 0 249 60 449 244 534 492 27 77 28 90 32 312 l4 233 34 16 c42 20 101 85 121 133 24 55 21 159 -6 214 -26 53 -87 112 -140 134 -46 20 -156 20 -202 0 -199 -83 -215 -381 -26 -479 l39 -19 -4 -207 c-5 -237 -17 -291 -88 -400 -225 -349 -715 -349 -940 0 -71 109 -83 164 -88 400 l-4 207 39 19 c85 44 132 127 133 232 0 175 -145 292 -320 259z"/>
                                </g>
                            </svg>
                            <span>@lang("website.orders")</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a href="/admin/reviews" id="reviews" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="512.000000pt"
                                 height="512.000000pt" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" viewBox="0 0 512.000000 512.000000"
                                 preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#506690"
                                   stroke="none">
                                    <path
                                        d="M714 5096 c-65 -30 -120 -85 -150 -150 l-24 -51 0 -905 0 -905 24 -51 c30 -65 85 -120 150 -150 47 -22 64 -24 202 -24 150 0 151 0 178 26 37 37 37 110 1 147 -24 24 -33 25 -153 29 -135 4 -160 11 -184 57 -20 36 -19 1707 1 1743 30 56 -99 53 2071 53 2170 0 2041 3 2071 -53 20 -36 21 -1707 1 -1743 -29 -54 -29 -54 -429 -59 l-373 -5 -172 -172 -172 -172 -177 174 -176 175 -411 0 -412 0 -30 59 c-37 75 -128 173 -204 223 -69 44 -258 108 -321 108 -31 0 -49 -6 -66 -24 -16 -16 -63 -131 -142 -352 -132 -365 -156 -419 -226 -515 -66 -89 -159 -163 -315 -247 l-129 -71 -40 34 c-73 63 -89 65 -502 65 -420 0 -430 -1 -511 -73 -26 -23 -57 -63 -70 -92 l-24 -50 0 -955 0 -955 24 -50 c29 -64 77 -112 141 -141 50 -24 52 -24 440 -24 388 0 390 0 440 24 28 12 66 39 85 59 l35 36 130 -44 c224 -76 208 -75 1089 -75 l781 0 57 24 c103 42 169 110 209 216 26 69 27 178 2 252 l-19 55 53 28 c66 34 127 100 161 173 37 81 42 194 13 277 -12 32 -21 60 -21 62 0 1 16 10 35 19 135 64 218 231 194 388 -19 119 -102 232 -205 277 -26 12 -43 25 -40 32 86 202 9 416 -182 505 l-57 27 -442 3 c-244 1 -443 6 -443 9 0 4 28 90 61 192 41 125 63 208 67 254 l5 67 346 0 345 0 201 -200 201 -200 49 0 48 0 202 200 201 200 345 0 c341 0 344 0 395 24 65 30 120 85 150 150 l24 51 0 905 0 905 -24 51 c-30 65 -85 120 -150 150 l-51 24 -2065 0 -2065 0 -51 -24z m1483 -1917 c120 -57 193 -168 201 -304 4 -79 3 -83 -87 -358 -85 -257 -91 -281 -81 -313 24 -71 5 -68 581 -74 503 -5 518 -6 545 -26 53 -39 69 -71 69 -134 0 -63 -16 -95 -69 -134 -26 -20 -44 -21 -344 -26 -347 -5 -353 -6 -378 -65 -19 -45 -8 -90 28 -120 l30 -25 406 0 c375 0 410 -2 448 -19 124 -56 131 -216 13 -286 -32 -19 -55 -20 -456 -23 l-421 -3 -25 -25 c-36 -36 -43 -76 -20 -122 28 -58 47 -61 394 -61 301 -1 307 -1 340 -24 58 -39 81 -84 77 -145 -5 -56 -25 -91 -72 -126 -26 -20 -44 -21 -360 -26 -364 -5 -356 -4 -382 -67 -17 -41 -8 -85 23 -115 24 -22 31 -23 252 -28 l228 -5 36 -28 c48 -36 67 -75 67 -134 0 -60 -33 -112 -87 -139 -36 -18 -74 -19 -693 -22 -847 -4 -921 2 -1155 93 l-95 37 0 851 0 852 146 79 c233 126 342 217 444 373 57 86 88 160 206 485 101 280 82 259 191 207z m-1695 -1684 l3 -635 28 -27 c39 -40 105 -40 144 0 l28 27 3 635 2 635 120 0 c111 0 121 -2 147 -24 l28 -24 0 -911 0 -911 -28 -27 -27 -28 -345 0 -345 0 -27 28 -28 27 0 911 0 911 28 24 c26 22 36 24 147 24 l120 0 2 -635z"/>
                                    <path
                                        d="M553 638 c-31 -15 -56 -73 -49 -112 20 -108 182 -108 202 0 8 41 -18 97 -52 113 -30 14 -72 13 -101 -1z"/>
                                    <path
                                        d="M1534 4529 c-44 -12 -89 -68 -130 -157 -19 -42 -36 -77 -37 -79 -2 -1 -48 -10 -102 -18 -55 -9 -115 -23 -133 -32 -44 -21 -82 -87 -82 -144 0 -57 26 -99 108 -175 l66 -60 -18 -105 c-9 -58 -14 -119 -10 -138 9 -46 70 -106 119 -120 53 -14 95 -3 193 49 l80 43 91 -47 c134 -69 214 -64 274 16 36 49 39 73 20 190 l-17 108 81 83 c86 88 102 123 89 189 -9 45 -46 95 -82 113 -17 8 -75 22 -130 30 -54 9 -99 17 -100 18 -1 1 -22 43 -47 92 -49 98 -74 126 -126 144 -39 13 -63 13 -107 0z m94 -334 c21 -40 46 -72 65 -84 31 -18 44 -22 130 -36 l39 -6 -50 -53 c-64 -68 -78 -112 -63 -197 6 -34 9 -64 7 -66 -2 -2 -32 10 -67 27 -80 38 -118 38 -198 0 -35 -17 -65 -29 -67 -27 -2 2 1 30 7 64 15 84 1 129 -61 197 l-50 54 27 5 c16 3 46 9 68 12 61 10 101 43 138 112 17 35 34 63 37 63 3 0 20 -29 38 -65z"/>
                                    <path
                                        d="M2805 4528 c-49 -17 -74 -48 -122 -143 -25 -49 -47 -91 -48 -93 -2 -2 -46 -10 -100 -18 -53 -8 -109 -21 -125 -29 -68 -35 -105 -125 -81 -197 6 -19 44 -67 90 -112 l78 -78 -13 -71 c-30 -154 -12 -225 64 -270 57 -33 115 -26 222 28 l93 47 91 -46 c126 -63 180 -65 244 -10 61 52 69 88 48 220 l-18 107 61 54 c107 96 135 176 91 262 -26 52 -71 78 -155 90 -147 23 -129 11 -185 119 -34 67 -60 104 -83 119 -39 27 -110 37 -152 21z m85 -319 c32 -68 86 -115 141 -123 24 -4 56 -9 72 -12 l27 -6 -49 -54 c-61 -67 -73 -102 -60 -191 5 -36 7 -68 5 -70 -2 -2 -31 9 -65 26 -77 39 -118 39 -200 1 -35 -17 -65 -29 -66 -28 -2 2 2 31 8 66 14 85 -1 131 -64 198 l-50 52 70 12 c93 16 129 41 166 118 17 34 33 62 36 62 3 0 16 -23 29 -51z"/>
                                    <path
                                        d="M4064 4521 c-47 -22 -67 -47 -119 -151 -21 -41 -39 -76 -40 -78 -2 -2 -46 -10 -100 -18 -53 -8 -109 -21 -125 -29 -64 -33 -99 -115 -79 -187 8 -32 31 -63 89 -123 l78 -80 -15 -85 c-25 -143 -5 -218 70 -256 58 -30 113 -23 218 31 l96 48 78 -42 c129 -69 205 -73 266 -12 47 47 55 97 36 214 l-16 102 74 76 c82 84 95 108 95 178 0 91 -56 143 -175 160 -147 23 -129 11 -186 121 -56 110 -85 136 -160 145 -31 4 -56 0 -85 -14z m149 -388 c24 -27 83 -49 152 -58 l50 -7 -41 -37 c-80 -71 -98 -130 -75 -248 l8 -41 -67 34 c-88 45 -128 45 -215 -1 -37 -19 -65 -29 -62 -21 11 29 19 128 12 162 -4 26 -24 55 -62 95 l-55 58 49 6 c114 15 160 49 208 154 l19 43 29 -59 c16 -32 38 -68 50 -80z"/>
                                    <path
                                        d="M1375 3036 c-28 -29 -40 -66 -31 -102 25 -100 177 -100 202 0 9 36 -3 73 -31 102 -18 18 -35 24 -70 24 -35 0 -52 -6 -70 -24z"/>
                                </g>
                            </svg>
                            <span>@lang("website.reviews")</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a href="/admin/banners" id="banners" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-layout">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="3" y1="9" x2="21" y2="9"></line>
                                <line x1="9" y1="21" x2="9" y2="9"></line>
                            </svg>
                            <span>@lang("website.banners")</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a id="section_banners" href="/admin/section_banners" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-layout">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="3" y1="9" x2="21" y2="9"></line>
                                <line x1="9" y1="21" x2="9" y2="9"></line>
                            </svg>
                            <span>@lang("website.section-banners")</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a href="/admin/pages" id="pages" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-book">
                                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                            </svg>
                            <span>@lang("website.pages")</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a href="/admin/actions" id="actions" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="512.000000pt"
                                 height="512.000000pt" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-zap" viewBox="0 0 512.000000 512.000000"
                                 preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#506690"
                                   stroke="none">
                                    <path
                                        d="M2435 5106 c-96 -31 -146 -68 -335 -248 -117 -112 -205 -188 -225 -195 -28 -10 -74 -6 -277 23 -275 38 -310 40 -393 19 -122 -32 -225 -113 -281 -221 -39 -73 -45 -100 -89 -354 -20 -113 -41 -220 -46 -238 -14 -44 -43 -63 -259 -178 -224 -118 -291 -162 -331 -217 -76 -104 -105 -199 -96 -316 7 -90 23 -130 151 -393 57 -118 96 -210 96 -228 0 -18 -39 -110 -96 -228 -128 -263 -144 -303 -151 -393 -9 -117 20 -212 96 -316 40 -55 107 -99 331 -217 216 -115 245 -134 259 -178 6 -18 28 -134 50 -258 44 -249 54 -285 102 -366 74 -123 226 -205 377 -204 26 1 155 16 287 34 194 27 245 31 271 22 19 -6 113 -88 226 -195 166 -159 203 -189 268 -220 73 -35 79 -36 190 -36 111 0 117 1 190 36 65 31 102 61 268 220 141 134 203 187 230 195 30 9 81 4 272 -22 269 -38 313 -40 395 -19 122 32 225 113 281 221 39 73 45 100 89 354 20 113 41 220 46 238 14 44 43 63 259 178 224 118 291 162 331 217 76 104 105 199 96 316 -7 90 -23 130 -151 393 -57 118 -96 210 -96 228 0 18 39 110 96 228 128 263 144 303 151 393 9 117 -20 212 -96 316 -40 55 -107 99 -331 217 -216 115 -245 134 -259 178 -5 18 -26 125 -46 238 -44 254 -50 281 -89 354 -56 108 -159 189 -281 221 -83 21 -118 19 -393 -19 -203 -29 -249 -33 -277 -23 -20 7 -108 83 -227 196 -167 159 -203 189 -268 220 -68 33 -84 36 -175 38 -63 2 -115 -2 -140 -11z m178 -300 c18 -8 116 -94 218 -192 190 -184 246 -224 343 -250 75 -20 146 -17 401 20 151 22 240 30 259 25 38 -11 72 -34 91 -62 8 -12 33 -126 55 -252 60 -340 73 -374 172 -472 41 -40 103 -78 273 -168 121 -65 232 -130 247 -145 29 -31 50 -91 42 -118 -3 -9 -57 -125 -120 -257 -127 -267 -141 -317 -123 -442 7 -55 31 -115 123 -308 63 -132 117 -248 120 -257 8 -27 -13 -87 -42 -118 -15 -15 -126 -80 -247 -145 -170 -90 -232 -128 -273 -168 -99 -98 -112 -132 -172 -472 -22 -126 -47 -240 -55 -252 -19 -28 -53 -51 -91 -62 -19 -5 -108 3 -259 25 -255 37 -326 40 -401 20 -97 -26 -153 -66 -348 -254 -208 -199 -233 -215 -303 -194 -28 8 -89 60 -229 194 -198 190 -247 226 -349 253 -83 21 -139 19 -400 -19 -151 -22 -240 -30 -259 -25 -38 11 -72 34 -91 62 -8 12 -33 126 -55 252 -60 340 -73 374 -172 472 -41 40 -103 78 -273 168 -121 65 -232 130 -247 145 -29 31 -50 91 -42 118 3 9 57 125 120 257 127 267 141 317 123 442 -7 55 -31 115 -123 308 -63 132 -117 248 -120 257 -8 27 13 87 42 118 15 15 126 80 247 145 170 90 232 128 273 168 99 98 112 132 172 472 22 126 47 240 55 252 19 28 53 51 91 62 19 5 108 -3 259 -25 255 -37 326 -40 401 -20 97 26 153 66 343 250 220 211 245 226 324 192z"/>
                                    <path
                                        d="M1830 3876 c-149 -43 -280 -148 -345 -276 -84 -166 -79 -372 13 -530 37 -63 147 -169 209 -203 66 -35 190 -67 263 -67 77 0 200 33 268 72 120 69 217 194 257 333 25 83 22 221 -4 306 -49 156 -182 294 -338 351 -72 27 -253 34 -323 14z m206 -301 c106 -31 181 -136 172 -239 -18 -208 -261 -301 -406 -156 -45 45 -63 84 -69 149 -10 107 55 206 159 242 65 22 81 23 144 4z"/>
                                    <path
                                        d="M3485 3679 c-20 -6 -349 -328 -1032 -1011 -838 -838 -1005 -1009 -1014 -1041 -30 -111 64 -211 179 -191 33 5 147 116 1045 1013 1081 1080 1037 1032 1021 1117 -9 48 -57 101 -102 114 -43 12 -56 11 -97 -1z"/>
                                    <path
                                        d="M3012 2300 c-186 -49 -332 -194 -387 -385 -24 -82 -22 -221 4 -306 50 -158 192 -304 347 -355 83 -27 265 -27 348 0 119 40 247 146 305 255 47 90 65 164 64 271 -1 157 -48 266 -163 380 -79 78 -142 114 -246 140 -96 25 -177 25 -272 0z m233 -309 c121 -54 176 -191 125 -309 -46 -106 -159 -167 -267 -142 -114 25 -198 131 -191 240 10 133 110 230 238 230 32 0 72 -8 95 -19z"/>
                                </g>
                            </svg>
                            <span>@lang("website.products_in_action")</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a href="/admin/categories" id="categories" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-layers">
                                <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                <polyline points="2 17 12 22 22 17"></polyline>
                                <polyline points="2 12 12 17 22 12"></polyline>
                            </svg>
                            <span>@lang("website.categories")</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a href="/admin/action_categories" id="action_categories" aria-expanded="false"
                       class="dropdown-toggle">
                        <div class="">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="512.000000pt"
                                 height="512.000000pt" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-zap" viewBox="0 0 512.000000 512.000000"
                                 preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#506690"
                                   stroke="none">
                                    <path
                                        d="M2435 5106 c-96 -31 -146 -68 -335 -248 -117 -112 -205 -188 -225 -195 -28 -10 -74 -6 -277 23 -275 38 -310 40 -393 19 -122 -32 -225 -113 -281 -221 -39 -73 -45 -100 -89 -354 -20 -113 -41 -220 -46 -238 -14 -44 -43 -63 -259 -178 -224 -118 -291 -162 -331 -217 -76 -104 -105 -199 -96 -316 7 -90 23 -130 151 -393 57 -118 96 -210 96 -228 0 -18 -39 -110 -96 -228 -128 -263 -144 -303 -151 -393 -9 -117 20 -212 96 -316 40 -55 107 -99 331 -217 216 -115 245 -134 259 -178 6 -18 28 -134 50 -258 44 -249 54 -285 102 -366 74 -123 226 -205 377 -204 26 1 155 16 287 34 194 27 245 31 271 22 19 -6 113 -88 226 -195 166 -159 203 -189 268 -220 73 -35 79 -36 190 -36 111 0 117 1 190 36 65 31 102 61 268 220 141 134 203 187 230 195 30 9 81 4 272 -22 269 -38 313 -40 395 -19 122 32 225 113 281 221 39 73 45 100 89 354 20 113 41 220 46 238 14 44 43 63 259 178 224 118 291 162 331 217 76 104 105 199 96 316 -7 90 -23 130 -151 393 -57 118 -96 210 -96 228 0 18 39 110 96 228 128 263 144 303 151 393 9 117 -20 212 -96 316 -40 55 -107 99 -331 217 -216 115 -245 134 -259 178 -5 18 -26 125 -46 238 -44 254 -50 281 -89 354 -56 108 -159 189 -281 221 -83 21 -118 19 -393 -19 -203 -29 -249 -33 -277 -23 -20 7 -108 83 -227 196 -167 159 -203 189 -268 220 -68 33 -84 36 -175 38 -63 2 -115 -2 -140 -11z m178 -300 c18 -8 116 -94 218 -192 190 -184 246 -224 343 -250 75 -20 146 -17 401 20 151 22 240 30 259 25 38 -11 72 -34 91 -62 8 -12 33 -126 55 -252 60 -340 73 -374 172 -472 41 -40 103 -78 273 -168 121 -65 232 -130 247 -145 29 -31 50 -91 42 -118 -3 -9 -57 -125 -120 -257 -127 -267 -141 -317 -123 -442 7 -55 31 -115 123 -308 63 -132 117 -248 120 -257 8 -27 -13 -87 -42 -118 -15 -15 -126 -80 -247 -145 -170 -90 -232 -128 -273 -168 -99 -98 -112 -132 -172 -472 -22 -126 -47 -240 -55 -252 -19 -28 -53 -51 -91 -62 -19 -5 -108 3 -259 25 -255 37 -326 40 -401 20 -97 -26 -153 -66 -348 -254 -208 -199 -233 -215 -303 -194 -28 8 -89 60 -229 194 -198 190 -247 226 -349 253 -83 21 -139 19 -400 -19 -151 -22 -240 -30 -259 -25 -38 11 -72 34 -91 62 -8 12 -33 126 -55 252 -60 340 -73 374 -172 472 -41 40 -103 78 -273 168 -121 65 -232 130 -247 145 -29 31 -50 91 -42 118 3 9 57 125 120 257 127 267 141 317 123 442 -7 55 -31 115 -123 308 -63 132 -117 248 -120 257 -8 27 13 87 42 118 15 15 126 80 247 145 170 90 232 128 273 168 99 98 112 132 172 472 22 126 47 240 55 252 19 28 53 51 91 62 19 5 108 -3 259 -25 255 -37 326 -40 401 -20 97 26 153 66 343 250 220 211 245 226 324 192z"/>
                                    <path
                                        d="M1830 3876 c-149 -43 -280 -148 -345 -276 -84 -166 -79 -372 13 -530 37 -63 147 -169 209 -203 66 -35 190 -67 263 -67 77 0 200 33 268 72 120 69 217 194 257 333 25 83 22 221 -4 306 -49 156 -182 294 -338 351 -72 27 -253 34 -323 14z m206 -301 c106 -31 181 -136 172 -239 -18 -208 -261 -301 -406 -156 -45 45 -63 84 -69 149 -10 107 55 206 159 242 65 22 81 23 144 4z"/>
                                    <path
                                        d="M3485 3679 c-20 -6 -349 -328 -1032 -1011 -838 -838 -1005 -1009 -1014 -1041 -30 -111 64 -211 179 -191 33 5 147 116 1045 1013 1081 1080 1037 1032 1021 1117 -9 48 -57 101 -102 114 -43 12 -56 11 -97 -1z"/>
                                    <path
                                        d="M3012 2300 c-186 -49 -332 -194 -387 -385 -24 -82 -22 -221 4 -306 50 -158 192 -304 347 -355 83 -27 265 -27 348 0 119 40 247 146 305 255 47 90 65 164 64 271 -1 157 -48 266 -163 380 -79 78 -142 114 -246 140 -96 25 -177 25 -272 0z m233 -309 c121 -54 176 -191 125 -309 -46 -106 -159 -167 -267 -142 -114 25 -198 131 -191 240 10 133 110 230 238 230 32 0 72 -8 95 -19z"/>
                                </g>
                            </svg>
                            <span>@lang("website.categories_in_action")</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a href="/admin/filters" id="filters" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-layers">
                                <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                <polyline points="2 17 12 22 22 17"></polyline>
                                <polyline points="2 12 12 17 22 12"></polyline>
                            </svg>
                            <span>@lang("website.filters")</span>
                        </div>
                    </a>
                </li>
                {{--                <li class="menu">--}}
                {{--                    <a href="/admin/colors" id="colors" aria-expanded="false" class="dropdown-toggle">--}}
                {{--                        <div class="">--}}
                {{--                            --}}{{--                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>--}}
                {{--                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="512.000000pt"--}}
                {{--                                 height="512.000000pt" viewBox="0 0 512.000000 512.000000"--}}
                {{--                                 preserveAspectRatio="xMidYMid meet" stroke="currentColor"--}}
                {{--                                 class="feather feather-layers">--}}

                {{--                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#506690"--}}
                {{--                                   stroke="none">--}}
                {{--                                    <path--}}
                {{--                                        d="M2228 5105 c-701 -96 -1304 -449 -1723 -1010 -244 -327 -402 -695 -475 -1106 -28 -156 -39 -531 -21 -702 101 -947 715 -1756 1604 -2113 282 -113 531 -163 859 -171 302 -8 456 17 633 101 194 92 308 214 378 401 25 68 30 98 35 205 4 106 1 139 -17 210 -35 141 -92 246 -194 358 -27 30 -61 80 -76 111 -22 48 -26 69 -26 146 1 77 5 98 28 145 34 71 106 143 176 177 76 37 193 43 271 14 61 -23 87 -40 186 -124 80 -68 219 -139 319 -163 96 -23 278 -23 365 0 290 79 477 315 540 684 25 144 27 430 5 612 -70 566 -323 1078 -735 1491 -411 412 -918 661 -1493 734 -146 19 -502 18 -639 0z m637 -315 c885 -123 1634 -791 1864 -1660 58 -221 65 -283 65 -550 0 -276 -10 -336 -80 -478 -134 -274 -431 -307 -694 -77 -146 129 -299 182 -494 172 -182 -8 -312 -64 -436 -187 -124 -123 -189 -268 -197 -445 -9 -185 47 -343 172 -485 36 -41 82 -109 103 -149 36 -73 37 -78 37 -185 0 -101 -3 -116 -28 -167 -58 -120 -198 -212 -378 -250 -71 -14 -134 -19 -261 -19 -1014 -2 -1910 704 -2164 1703 -86 339 -86 755 0 1094 141 555 485 1035 969 1351 104 68 309 171 427 215 349 130 719 169 1095 117z"/>--}}
                {{--                                    <path--}}
                {{--                                        d="M2101 4491 c-120 -45 -207 -124 -264 -240 -31 -64 -32 -71 -32 -191 0 -120 1 -127 32 -191 58 -118 146 -197 269 -240 49 -17 77 -20 164 -17 95 3 112 7 175 38 92 44 171 123 216 215 33 68 34 73 34 195 0 122 -1 127 -34 195 -45 92 -124 171 -216 215 -65 32 -79 35 -180 37 -90 3 -120 0 -164 -16z m223 -310 c43 -29 66 -70 66 -121 0 -80 -60 -140 -140 -140 -80 0 -140 60 -140 140 0 80 60 140 140 140 27 0 56 -8 74 -19z"/>--}}
                {{--                                    <path--}}
                {{--                                        d="M1201 3591 c-120 -45 -207 -124 -264 -240 -31 -64 -32 -71 -32 -191 0 -120 1 -127 32 -191 58 -118 146 -197 269 -240 49 -17 77 -20 164 -17 95 3 112 7 175 38 92 44 171 123 216 215 33 68 34 73 34 195 0 122 -1 127 -34 195 -45 92 -124 171 -216 215 -65 32 -79 35 -180 37 -90 3 -120 0 -164 -16z m223 -310 c43 -29 66 -70 66 -121 0 -80 -60 -140 -140 -140 -80 0 -140 60 -140 140 0 80 60 140 140 140 27 0 56 -8 74 -19z"/>--}}
                {{--                                    <path--}}
                {{--                                        d="M3911 3291 c-120 -45 -207 -124 -264 -240 -31 -64 -32 -71 -32 -191 0 -120 1 -127 32 -191 58 -118 146 -197 269 -240 49 -17 77 -20 164 -17 95 3 112 7 175 38 92 44 171 123 216 215 33 68 34 73 34 195 0 122 -1 127 -34 195 -45 92 -124 171 -216 215 -65 32 -79 35 -180 37 -90 3 -120 0 -164 -16z m223 -310 c43 -29 66 -70 66 -121 0 -51 -23 -92 -66 -121 -61 -40 -152 -18 -195 47 -40 61 -18 152 47 195 18 11 47 19 74 19 27 0 56 -8 74 -19z"/>--}}
                {{--                                    <path--}}
                {{--                                        d="M1201 2391 c-120 -45 -207 -124 -264 -240 -31 -64 -32 -71 -32 -191 0 -120 1 -127 32 -191 58 -118 146 -197 269 -240 49 -17 77 -20 164 -17 95 3 112 7 175 38 92 44 171 123 216 215 33 68 34 73 34 195 0 122 -1 127 -34 195 -45 92 -124 171 -216 215 -65 32 -79 35 -180 37 -90 3 -120 0 -164 -16z m223 -310 c89 -59 89 -183 0 -242 -61 -40 -152 -18 -195 47 -40 61 -18 152 47 195 38 25 110 25 148 0z"/>--}}
                {{--                                    <path--}}
                {{--                                        d="M2101 1491 c-120 -45 -207 -124 -264 -240 -31 -64 -32 -71 -32 -191 0 -120 1 -127 32 -191 58 -118 146 -197 269 -240 49 -17 77 -20 164 -17 95 3 112 7 175 38 92 44 171 123 216 215 33 68 34 73 34 195 0 122 -1 127 -34 195 -45 92 -124 171 -216 215 -65 32 -79 35 -180 37 -90 3 -120 0 -164 -16z m223 -310 c43 -29 66 -70 66 -121 0 -80 -60 -140 -140 -140 -80 0 -140 60 -140 140 0 80 60 140 140 140 27 0 56 -8 74 -19z"/>--}}
                {{--                                </g>--}}
                {{--                            </svg>--}}
                {{--                            <span>@lang("website.colors")</span>--}}
                {{--                        </div>--}}
                {{--                    </a>--}}
                {{--                </li>--}}
                <li class="menu">
                    <a href="/admin/clients" id="clients" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-users">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span>@lang("website.clients")</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a href="/admin/newsletters" id="newsletters" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-clipboard">
                                <path
                                    d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                            </svg>
                            <span>@lang("website.newsletter")</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a href="/admin/coupons" id="coupons" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-book">
                                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                            </svg>
                            <span>@lang("website.coupons")</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a id="video" href="/admin/video" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                            <span>@lang("website.video-banner")</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a href="/admin/languages" id="languages" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-book">
                                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                            </svg>
                            <span>@lang("website.languages")</span>
                        </div>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!--  END SIDEBAR  -->

    <style>

        .active-link {
            background: #bfc9d4;
            box-shadow: 0 1px 3px 0 rgb(0 0 0 / 10%), 0 1px 2px 0 rgb(0 0 0 / 6%);
            border-radius: 6px;
            color: #0e1726;
        }

    </style>
    <script>
        if (location.pathname.includes('products') || location.pathname.includes('product')) {
            document.getElementById('products').classList.add('active-link')
        } else if (location.pathname.includes('orders') || location.pathname.includes('order')) {
            document.getElementById('orders').classList.add('active-link')
        } else if (location.pathname.includes('review') || location.pathname.includes('reviews')) {
            document.getElementById('reviews').classList.add('active-link');
        } else if (location.pathname.includes('section_banners') || location.pathname.includes('section_banner')) {
            document.getElementById('section_banners').classList.add('active-link')
        } else if (location.pathname.includes('banners') || location.pathname.includes('banner')) {
            document.getElementById('banners').classList.add('active-link')
        } else if (location.pathname.includes('pages') || location.pathname.includes('page')) {
            document.getElementById('pages').classList.add('active-link')
        } else if (location.pathname.includes('action_category') || location.pathname.includes('action_categories')) {
            document.getElementById('action_categories').classList.add('active-link')
        } else if (location.pathname.includes('actions') || location.pathname.includes('action')) {
            document.getElementById('actions').classList.add('active-link')
        } else if (location.pathname.includes('categories') || location.pathname.includes('category')) {
            document.getElementById('categories').classList.add('active-link')
        } else if (location.pathname.includes('addedFilters') || location.pathname.includes('addedFilter')) {
            document.getElementById('addedFilters').classList.add('active-link')
        } else if (location.pathname.includes('filters') || location.pathname.includes('filter')) {
            document.getElementById('filters').classList.add('active-link')
        } else if (location.pathname.includes('clients') || location.pathname.includes('client')) {
            document.getElementById('clients').classList.add('active-link')
        } else if (location.pathname.includes('users') || location.pathname.includes('user')) {
            document.getElementById('users').classList.add('active-link')
        } else if (location.pathname.includes('newsletters') || location.pathname.includes('newsletter')) {
            document.getElementById('newsletters').classList.add('active-link');
        } else if (location.pathname.includes('subscriber')) {
            document.getElementById('subscribers').classList.add('active-link');
        } else if (location.pathname.includes('coupon')) {
            document.getElementById('coupons').classList.add('active-link');
        } else if (location.pathname.includes('report')) {
            document.getElementById('reports').classList.add('active-link');
        } else if (location.pathname.includes('video')) {
            document.getElementById('video').classList.add('active-link');
        } else if (location.pathname.includes('languages')) {
            document.getElementById('languages').classList.add('active-link');
        } else {
            document.getElementById('dashboard').classList.add('active-link')
        }


    </script>


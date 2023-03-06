<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <base href="../../../../">
    <meta charset="utf-8"/>
    <title>@lang('website.profile')</title>
    <meta name="description" content="User profile overview example"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="canonical" href="https://keenthemes.com/metronic"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <link href="/assets/profile/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/profile/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/profile/css/style.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/profile/css/style.bundle.rtl.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/profile/css/custom.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
    <link rel="shortcut icon" href="{{asset($conf->logo) ?? ""}}"/>
</head>

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled page-loading">
<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-row flex-column-fluid page">
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            @include('profile.layout.header_mobile')
            @include('profile.layout.header')
            @yield('content')
            @include('profile.layout.footer')
        </div>
    </div>
</div>
<div id="kt_scrolltop" class="scrolltop">
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                     height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24"/>
						<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1"/>
						<path
                            d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                            fill="#000000" fill-rule="nonzero"/>
					</g>
				</svg>
			</span>
</div>

<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
<script>var KTAppSettings = {
        "breakpoints": {"sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200},
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#6993FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#F3F6F9",
                    "dark": "#212121"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1E9FF",
                    "secondary": "#ECF0F3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#212121",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#ECF0F3",
                "gray-300": "#E5EAEE",
                "gray-400": "#D6D6E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#80808F",
                "gray-700": "#464E5F",
                "gray-800": "#1B283F",
                "gray-900": "#212121"
            }
        },
        "font-family": "Poppins"
    };</script>
<script src="/assets/profile/plugins/global/plugins.bundle.js"></script>
<script src="/assets/profile/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="/assets/profile/js/scripts.bundle.js"></script>
<script src="/assets/profile/js/pages/widgets.js"></script>
<script src="/assets/profile/js/pages/custom/profile/profile.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
<script>
    function showToast(type, message) {
        new Noty({
            type: type,
            theme: 'bootstrap-v4',
            text: message,
        }).show();
    }
</script>
@if(session('success'))
    <script>
        showToast('success', '{{session('success')}}');
    </script>
@endif
@if(session('error'))
    <script>
        showToast('error', '{{session('error')}}');
    </script>
@endif
<script>
    function changeTab(tab) {
        let overlay = document.querySelector('#overlay-id');
        overlay.classList.remove('offcanvas-mobile-overlay');
        let divs = document.querySelectorAll('.my-tabs');
        let aside = document.getElementById('kt_profile_aside');
        let body = document.querySelector('#kt_body');
        let width = body.offsetWidth;

        if (tab != "remove") {
            divs.forEach((el) => {
                el.classList.remove('active')
            });
        }
        if (width < 992) {
            body.removeAttribute('data-offcanvas-offcanvas-mobile');
            aside.style.display = 'none';
            aside.classList.remove('offcanvas-mobile-on');
        }

    }

    function openAside() {
        setTimeout(function () {
            let body = document.querySelector('#kt_body');
            console.log(document.querySelector('#overlay-id'))
            let aside = document.getElementById('kt_profile_aside')
            let overlay = document.querySelector('#overlay-id');
            body.setAttribute('data-offcanvas-offcanvas-mobile', 'on');
            aside.classList.add('offcanvas-mobile-on');
            overlay.classList.add('offcanvas-mobile-overlay');
            aside.style.display = 'block';
        }, 5);
    }

</script>
@yield('footer')

</body>
</html>


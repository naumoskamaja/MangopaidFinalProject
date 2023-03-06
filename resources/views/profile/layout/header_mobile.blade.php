<!--begin::Header Mobile-->
<div id="kt_header_mobile" class="header-mobile header-mobile-fixed" style="background: black;">
    <!--begin::Logo-->
    <a href="/">
        <img alt="Logo" src="@if(isset($conf->logo)){{asset($conf->logo)}}@else /assets/profile/media/logos/logo-letter-12.png  @endif " class="max-h-30px" />
    </a>
    <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" onclick="openAside()"
            id="kt_subheader_mobile_toggle">
        <span></span>
    </button>
    <!--end::Logo-->
</div>

<!--end::Header Mobile-->

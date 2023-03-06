
<main class="site-main  main-container no-sidebar" data-bg-img="@if ($banner!=null) {{asset($banner->image)}} @else /assets/banner.webp @endif" style="position:relative;background-size: cover;padding:0;">
    <div style="width: 100%;height: 100%;background-color: rgba(0,0,0,0.65);position: absolute"></div>
    <div class="container" style="padding: 30px 0 30px 0;">
        <div class="row" >
            <div class="main-content col-md-12 text-center p-100-0" style="z-index: 999999">
                <br/>
                <h1 class="text-white" style="font-size:42px;"><b>@lang("website.thank_you_for_ordering_from_us")</b></h1>
                <h3 class="text-white" style="margin-bottom: 180px;">@lang("website.thank_you_for_ordering_from_us_description")</h3>
                <h3 class="text-white" style="font-size:32px;"><b>@lang("website.what_now_follow_text")</b></h3>
                <div style="display: flex;justify-content: center;color: white">
                    @if($conf->facebook!=null)
                        <a href={{$conf->facebook}} target="_blank">
                            <img src="/assets/gallery/facebook.svg" alt="Facebook" style="width: 50px;margin-right:5px;">
                        </a>
                    @endif
                    @if($conf->instagram!=null)
                        <a href={{$conf->instagram}} target="_blank">
                            <img src="/assets/gallery/instagram.svg" alt="Instagram" style="width: 50px;">
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>

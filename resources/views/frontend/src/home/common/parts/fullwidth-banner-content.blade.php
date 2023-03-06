<div class="container">
    <div class="row">
        <div class="col-xl-5 col-lg-10 m-auto">
            <div class="divider-content divider-content-style1" data-aos="fade-up" data-aos-duration="1000">
                <h2>{{$fullwidth_banner->title}}</h2>
                <p>{{$fullwidth_banner->description}}</p>
                <a href="{{$fullwidth_banner->link ?? '/search'}}"
                   class="btn-theme btn-white">@lang('website.view-more')</a>
            </div>
        </div>
    </div>
</div>

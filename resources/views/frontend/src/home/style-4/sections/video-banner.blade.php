<!--== Start Video Divider Area Wrapper ==-->
<div class="divider-area divider-about-area">
    <div class="container-fluid xs-pr-15 xs-pl-15 p-0">
        <div class="row">
            <div class="col-lg-6">
                <div class="divider-about-content">
                    <div class="divider-content" data-aos="fade-up" data-aos-duration="1000" style="margin: ">
                        <span class="video-text">{{$video->title}}</span>
                        <p>{{$video->description}}</p>
                        <a href="{{$video->link ?? '/search'}}" class="btn-theme btn-black btn-border">@lang('website.read-more')</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="video-content" data-aos="fade-up" data-aos-duration="1000">
                    <div class="thumb">
                        <iframe class="video-home"
                                src="{{str_replace("watch?v=","embed/",$video->youtube_link)}}"
                                title="YouTube video player" frameborder="0" height="400" width="100%"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== End Video Divider Area Wrapper ==-->

<section class="featured-area featured-style2-area">
    <div class="row featured-style2" data-aos="fade-up" data-aos-duration="1000">
        @foreach($shop_information as $information)
            <div class="col-sm-6 col-md-4">
                <div class="featured-item">
                    <div class="content">
                        @if(isset($information->icon) && $information->icon!=null)
                            <span class="icon">
                                <img src="{{$information->icon}}">
                            </span>
                        @endif
                        <div class="inner-content">
                            <h4 class="title">
                                {!!   \App\Library\LibHelper::echoJson($information->title,__('website.lang')) !!}
                            </h4>
                            <p>
                                {!! html_entity_decode(  \App\Library\LibHelper::echoJson($information->content,__('website.lang'))) !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

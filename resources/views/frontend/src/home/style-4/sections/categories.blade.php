<section class="category-area category-slider-area">
    <div class="container-fluid pl-xs-15 pr-xs-15 p-0">
        <div class="row">
            <div class="col-md-12">
                <div class="category-slider-content">
                    <div class="swiper-container category-shop-slider-container">
                        <div class="swiper-wrapper">
                            @foreach($main_categories as $category)
                                <div class="swiper-slide">
                                    <div class="category-item">
                                        <div class="thumb">
                                            <img src="{{asset($category->image)}}" alt="Moren-Shop">
                                        </div>
                                        <div class="content">
                                            <div class="inner-content">
                                                <h4 class="title">{{$category->title[session('lang')??'en']}}</h4>
                                                @if(isset($category->subcategories) && count($category->subcategories)>0)
                                                    <div class="meta">
                                                        @foreach($category->subcategories as $subcategory)
                                                            <a href="/search/{!! $subcategory->id !!}/{{urlencode($category->title[session('lang')??'en'])}}/{{urlencode($subcategory->title[session('lang')??'en'])}}">{{$subcategory->title[session('lang')??'en']}}</a>
                                                        @endforeach
                                                    </div>
                                                @endif
                                                <a href="/search/{!! $category->id !!}/{{urlencode($category->title[session('lang')??'en'])}}"
                                                   class="btn-theme btn-white btn-border btn-size-sm">View All</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="category-area category-default-area @if(count($sliders)>0) m-t-40" @endif>
    <div class="container-fluid xs-pr-15 xs-pl-15 p-0">
        <div class="row row-gutter-6 category-items-style2">
            <?php $category_banners = \App\Library\BannersHelper::getBannersFrontend()['category_banners'] ?>
            @if(isset($category_banners) && count($category_banners)>0)
                @foreach($category_banners as $c)
                    <div class="col-6 col-sm-6 col-lg-3">
                        <div class="category-item">
                            <div class="thumb">
                                <a
                                    @if($c->link != null)
                                    href="{!! $c->link !!}"
                                    @else
                                    href="/search/{!! $c->category->id !!}/{!! urlencode($c->category->title[session('lang')??'en']) !!}"
                                    @endif>
                                    <img src="{{\App\Library\ProductsHelper::get_image($c->category->image) }}"
                                         alt="Category-Shop">
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="title">{{$c->category->title[session('lang')??'en']}}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <?php $four_banner_categories = \App\Library\BannersHelper::getBannersFrontend()['four_banner_categories'] ?>
                @foreach($four_banner_categories as $c)
                    <div class="col-6 col-sm-6 col-lg-3">
                        <div class="category-item">
                            <div class="thumb">
                                <a href="/search/{!! $c->id !!}/{!! urlencode($c->title[session('lang')??'en']) !!}">
                                    <img src="{{\App\Library\ProductsHelper::get_image($c->image) }}" alt="Category-Shop">
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="title">{{$c->title[session('lang')??'en']}}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="col-md-12 text-center">
                <a href="/search"
                   class="btn-theme btn-black btn-border btn-padding mt-20">@lang('website.view-all-categories')</a>
            </div>
        </div>
    </div>
</section>

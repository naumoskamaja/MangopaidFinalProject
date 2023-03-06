<section class="newsletter-area bg-overlay2-6 bg-img featured-area featured-style2-area pad-100-0-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="newsletter-content content-style4 pb-0">
                    <p>@lang('website.start-typing-and-press-enter-to-search')</p>
                    <form action="/search" method="post" class="newsletter-form" enctype="multipart/form-data">
                        @csrf
                        <input class="form-control" name="search" type="text" id="search"
                               placeholder="@lang('website.search-products')..">
                        <button class="btn btn-submit" type="submit"><i class="lastudioicon-zoom-1"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

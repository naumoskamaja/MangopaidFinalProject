<section class="newsletter-area bg-overlay-black2-6 bg-parallax" data-speed="1.136" data-bg-img="/assets/gallery/banner-2.jpg" style="margin-top: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="newsletter-content content-style3" data-aos="fade-up" data-aos-duration="1000">
                    <h1 class="title">@lang('website.stay-in-the-loop')</h1>
                    <p>
                        @lang('website.subscribe-for-our-newsletter-to-be-updated-with-the-latest-products-and-news')
                    </p>
                    <form method="post" action="{{url('/subscribe') }}" class="newsletter-form" enctype="multipart/form-data">
                        @csrf
                        <input class="form-control" name="email" type="email" id="email" placeholder="@lang('website.enter-your-email-address')">
                        @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                        <button class="btn btn-submit" type="submit">@lang('website.subscribe')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<aside class="product-find-size-modal">
    <div class="product-quick-view-inner">
        <div class="product-quick-view-content">
            <button type="button" class="btn-close">
                <span class="close-icon"><i class="lastudioicon-e-remove"></i></span>
            </button>
            <div class="row row-gutter-0">
                <div class="col-12">
                    <div class="single-product-info">
                        <section class="contact-area contact-about-area bg-img"
                                 data-bg-img="/assets/gallery/banner-2.jpg">
                            <div class="container-fluid">
                                <div class="row row-gutter-0">
                                    <div class="col-lg-6">
                                        <div class="col-left">
                                            <div class="section-title text-center">
                                                <h2 class="title">@lang('website.text-us')</h2>
                                                <p>@lang('website.if-you-need-a-help')</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="col-right">
                                            <div class="contact-form">
                                                <form class="contact-form-wrapper" id="contact-form" method="post"
                                                      action="/contact/help" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group mb-0">
                                                                <p class="form-control product-name-p">
                                                                    {{\App\Library\LibHelper::echoJson($product->name,__('website.lang'))}}
                                                                </p>
                                                                <p class="form-control"> (Ref. {{$product->code}}) </p>
                                                                <input class="form-control" type="hidden" name="product"
                                                                       value="{{$product->id}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input class="form-control" type="email" name="email"
                                                                       placeholder="@lang('website.email')*" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input class="form-control" type="text" name="phone"
                                                                       placeholder="@lang('website.phone')*" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group mb-0">
                                                                <textarea class="form-control" name="message"
                                                                          placeholder="@lang('website.how-can-we-help-you')"
                                                                          required></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group mb-0">
                                                                <button class="btn btn-theme btn-black"
                                                                        type="submit">@lang('website.send-message')</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="form-message"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="canvas-overlay"></div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="canvas-overlay"></div>
</aside>

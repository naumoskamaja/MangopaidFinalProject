<section class="product-area product-description-review-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-description-review" style="    border-top: 2px solid #ebebeb;">
                    <ul class="nav nav-tabs product-description-tab-menu" id="myTab" role="tablist" style="border: none">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" style="font-weight: bold" id="product-desc-tab" data-bs-toggle="tab"
                                    data-bs-target="#productDesc" type="button" role="tab"
                                    aria-controls="productDesc"
                                    aria-selected="true">@lang('website.description')</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" style="font-weight: bold" id="product-expert-tips-tab" data-bs-toggle="tab"
                                    data-bs-target="#productExpertTips" type="button" role="tab"
                                    aria-controls="productExpertTips"
                                    aria-selected="false">
                                    @lang('website.expert-tips')
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" style="font-weight: bold" id="product-review-tab" data-bs-toggle="tab"
                                    data-bs-target="#productReview" type="button" role="tab"
                                    aria-controls="productReview" aria-selected="false">@lang('website.reviews')
                                ({{count($reviews)}})
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content product-description-tab-content" id="myTabContent">
                        @include('frontend.src.products.single-product.parts.tabs.description')
                        @include('frontend.src.products.single-product.parts.tabs.expert-tips')
                        @include('frontend.src.products.single-product.parts.tabs.reviews')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

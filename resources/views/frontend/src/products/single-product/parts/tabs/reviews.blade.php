<div class="tab-pane fade" id="productReview" role="tabpanel" aria-labelledby="product-review-tab">
    <div class="product-review">
        <div class="product-review-comments">
            @if(count($reviews)==0)
                <h4 class="title">@lang("website.there_are_no_reviews_yet")</h4>
                <div id="review_form_wrapper">
                    <div id="review_form">
                        <div id="respond" class="comment-respond">
                            <span id="reply-title"
                                  class="comment-reply-title">@lang("website.be_the_first_to_review")
                                {{\App\Library\LibHelper::echoJson($product->name,__('website.lang') ?? 'en')}}
                            </span>
                        </div>
                    </div>
                </div>
            @else
                @foreach($reviews as $r)
                    <div class="comment-item">
                        @if($r->image!="")
                            <div class="thumb">
                                <span onclick='window.open("{{asset($r->image)}}")' target="_blank">
                                    <img src="{{asset($r->image)}}" alt="Moren-Shop">
                                </span>
                            </div>
                        @endif

                        <div class="content">
                            <div class="rating">
                                <i class="@if($r->stars>=1) lastudioicon-star-rate-1 @else lastudioicon-star-rate-2 @endif"></i>
                                <i class="@if($r->stars <= 1.24)lastudioicon-star-rate-2 @elseif($r->stars>=1.25 && $r->stars <= 1.74)fa fa-star-half-full @else lastudioicon-star-rate-1 @endif"></i>
                                <i class="@if($r->stars <= 2.24)lastudioicon-star-rate-2 @elseif($r->stars>=2.25 && $r->stars <= 2.74)fa fa-star-half-full @else lastudioicon-star-rate-1 @endif"></i>
                                <i class="@if($r->stars <= 3.24)lastudioicon-star-rate-2 @elseif($r->stars>=3.25 && $r->stars <= 3.74)fa fa-star-half-full @else lastudioicon-star-rate-1 @endif"></i>
                                <i class="@if($r->stars <= 4.24)lastudioicon-star-rate-2 @elseif($r->stars>=4.25 && $r->stars <= 4.74)fa fa-star-half-full @else lastudioicon-star-rate-1 @endif"></i>
                                <span>{{round($r->stars, 1)}}</span>
                            </div>
                            <h5 class="meta"><span>{{$r->first_name}} </span> – {{$r->created_at}}</h5>
                            <span class="review">{{$r->comment}}</span>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        {{-- user can write a review only if he is logged --}}
        {{--        @if(auth()->check()) --}}

        {{--  user can write a review only if he is logged and he has bought this product before  --}}
        @if(\App\Library\ProductsHelper::show_review_form($product->id))
            <form id="commentform" class="comment-form"
                  action="/show/{{$product->id}}" method="post" enctype="multipart/form-data">
                <div class="product-review-form">
                    <h3 class="title">@lang("website.submit_a_review")</h3>
                    <div class="review-form-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="p-10-0">
                                    <label for="author">@lang("website.name")&nbsp;<span
                                            class="required">*</span></label>
                                    <input class="form-control"  id="author" name="first_name"
                                           value="{{auth()->user()->first_name}}" size="30" required
                                           type="text" readonly>
                                    @error('first_name') <span class="error text-danger">{{ $message }}</span> @enderror

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group-2">
                                    <label for="email">@lang("website.email")&nbsp;
                                        <span class="required">*</span></label>
                                    <input class="form-control" id="email" name="email"
                                           value="{{auth()->user()->email}}" size="30" required
                                           type="email" readonly>
                                    @error('email') <span class="error text-danger">{{ $message }}</span> @enderror

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group-2">
                                    <label for="reviewFormTextarea">@lang("website.your_review") *</label>
                                    <textarea class="form-control" id="reviewFormTextarea" name="comment" rows="7"
                                              id="comment" required></textarea>
                                    @error('comment') <span class="error text-danger">{{ $message }}</span> @enderror

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="rating">@lang("website.your_rating") *</label>

                                <select class="form-control" title="product_cat" name="stars" id="rating" required>
                                    <option value="">@lang("website.rate")…</option>
                                    <option value="5">@lang("website.perfect") </option>
                                    <option value="4">@lang("website.good") </option>
                                    <option value="3">@lang("website.average") </option>
                                    <option value="2">@lang("website.not_that_bad") </option>
                                    <option value="1">@lang("website.very_poor") </option>
                                </select>
                                @error('stars') <span class="error text-danger">{{ $message }}</span> @enderror

                            </div>
                            <div class="col-md-8" style="margin-top: 28px !important;">
                                <label class="w-200-px">
                                    <input type="file" name="file" id="file" ref="file"/>
                                    @error('file') <span class="error text-danger">{{ $message }}</span> @enderror
                                </label>
                                <br/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="p-t-20">
                                    <button class="btn btn-theme btn-black"
                                            type="submit">@lang('website.submit')</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endif
    </div>
</div>


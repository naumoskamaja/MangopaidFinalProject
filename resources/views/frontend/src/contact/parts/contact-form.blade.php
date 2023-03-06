<div class=" col-lg-7">
    <div class="contact-form">
        <?php
        $x = rand(0, 9);
        $y = rand(0, 9);
        ?>
        <form class="contact-form-wrapper form-style" id="contact-form" method="post" action="/contact/make_request"
              enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="x" value="{{$x}}"/>
            <input type="hidden" name="y" value="{{$y}}"/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 class="title">@lang('website.contact-us-for-any-questions')</h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input class="form-control" type="email" placeholder="@lang('website.email')*"
                               name="email" value="" size="40" required>
                        @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-0">
              <textarea class="form-control textarea" placeholder="@lang('website.how-can-we-help')"
                        name="message"
                        cols="40" rows="10" required></textarea>
                        @error('message') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <label> {{$x}} + {{$y}} =<br>
                        <div class="form-group">
                            <input class="form-control" type="number" placeholder="@lang('website.enter-valid-sum')*"
                                   name="sum" value="" size="40" required>
                            @error('sum') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </label>
                </div>

                <div class="col-md-12">
                    <div class="form-group mb-0">
                        <button class="btn btn-theme btn-black" type="submit">@lang('website.send-message')</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="form-message"></div>
    </div>
</div>

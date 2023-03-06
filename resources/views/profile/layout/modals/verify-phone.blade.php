<div class="modal fade p-r-0" id="verifyPhoneNumber" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body p-2-5-rem">
                <form action="/send-code-phone" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">@lang('website.phone-umber') </label>
                        <input type="text" name="phoneNumber" class="form-control" id="exampleInputEmail1"
                               value="{{$client->phone}}">
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('website.confirm')</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('website.close')</button>
                </form>
            </div>
        </div>
    </div>
</div>

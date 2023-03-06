<div class="modal fade" id="verifyEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body p-2-5-rem" >
                <form action="/send-code-email" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">@lang('website.email-address')</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                               aria-describedby="emailHelp" placeholder="@lang('website.enter-email')" value="{{$client->email}}">
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('website.confirm')</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('website.close')</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="card-body p-2">
    <form action="{{ url('admin/languages') }}" method="post">
        @csrf
        <div>

            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <label>@lang('website.variable')</label>
                    <input type="text" name="langVar" class="form-control"
                           required/>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <label>EN</label>
                    <input type="text" name="en" class="form-control" required/>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <label>MK</label>
                    <input type="text" name="mk" class="form-control" required/>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <label>DE</label>
                    <input type="text" name="de" class="form-control" required/>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <label>AL</label>
                    <input type="text" name="al" class="form-control" required/>
                </div>
            </div>
            <div class="col-md-12 p10 text-right" style="margin: 20px 0;">
                <button type="submit"
                        class="btn btn-info">@lang('website.save')</button>
            </div>
        </div>
    </form>
</div>

<div class="form-group">
    <label for="cf_name">@lang('website.fullname') <abbr class="required" title="required">*</abbr></label>
    <input class="form-control" id="cf_name" type="text"
           name="name"
           value="{{auth()->user()->first_name}}" readonly/>
</div>

<div class="form-group">
    <label for="country">@lang("website.country") <abbr class="required" title="required">*</abbr></label>
    <input class="form-control" id="country" type="text"
           name="country"  v-model="user.country" @keyup="showShippingInfo()"
           value="{{auth()->user()->country}}"
           autocomplete="country" />
</div>

<div class="form-group">
    <label for="city">@lang("website.city") <abbr class="required" title="required">*</abbr></label>
    <input class="form-control" id="city" type="text"
           name="city" v-model="user.city"
           value="{{auth()->user()->city}}" placeholder="" autocomplete="city" />
</div>

<div class="form-group">
    <label for="cf_street_address">@lang("website.address")&nbsp; <abbr class="required"
                                                                        title="required">*</abbr></label>
    <input class="form-control" id="cf_street_address" type="text" placeholder=""
           name="address" v-model="user.address"
           value="{{auth()->user()->address}}"
           autocomplete="address" />
</div>

<div class="form-group">
    <label for="cf_zip">@lang("website.zip") <abbr class="required" title="required">*</abbr></label>
    <input class="form-control" id="cf_zip" type="text"
           name="zip"
           id="zip" value="{{auth()->user()->zip}}" placeholder="" autocomplete="zip" />
</div>

<div class="form-group">
    <label for="cf_phone">@lang("website.phone_number")&nbsp; <abbr class="required" title="required">*</abbr></label>
    <input class="form-control" id="cf_phone" type="text"
           name="phone"
           placeholder="" value="{{auth()->user()->phone}}" autocomplete="phone" />
</div>

<div class="form-group">
    <label for="cf_email">@lang('website.email-address')<abbr class="required" title="required">*</abbr></label>
    <input class="form-control" id="cf_email" type="email"
           name="email"
           value="{{auth()->user()->email}}" placeholder=""
           autocomplete="email" readonly/>
</div>

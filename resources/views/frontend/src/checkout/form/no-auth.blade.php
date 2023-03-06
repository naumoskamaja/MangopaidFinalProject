
<div class="form-group">
    <label for="cf_name">@lang('website.fullname') <abbr class="required" title="required">*</abbr></label>
    <input class="form-control" id="cf_name" type="text"
           name="name" v-model="user.fullname"
           value="{{old('name')}}" required>
</div>

<div class="form-group">
    <label for="cf_country_region">@lang("website.country") <abbr class="required" title="required">*</abbr></label>
    <input class="form-control" id="country" type="text"
           name="country"  v-model="user.country" @keyup="showShippingInfo()"
           value=" {{old('country')}}"
           autocomplete="country" />
</div>

<div class="form-group" >
    <label for="city">@lang("website.city") <abbr class="required" title="required">*</abbr></label>
    <input class="form-control" id="city" type="text"
           name="city" v-model="user.city"
           value="{{old('city')}}" placeholder="" autocomplete="city" required/>
</div>

<div class="form-group">
    <label for="cf_street_address">@lang("website.address")&nbsp; <abbr class="required"
                                                                        title="required">*</abbr></label>
    <input class="form-control" id="cf_street_address" type="text" placeholder=""
           name="address" v-model="user.address"
           value="{{old('address')}}"
           autocomplete="address" required/>
</div>

<div class="form-group">
    <label for="cf_zip">@lang("website.zip") <abbr class="required" title="required">*</abbr></label>
    <input class="form-control" id="cf_zip" type="text"
           name="zip" v-model="user.zip"
           id="zip" value="{{old('zip')}}" placeholder="" autocomplete="zip" required/>
</div>

<div class="form-group">
    <label for="cf_phone">@lang("website.phone_number")&nbsp; <abbr class="required" title="required">*</abbr></label>
    <input class="form-control" id="cf_phone" type="text"
           name="phone" v-model="user.phone"
           placeholder="" value="" autocomplete="phone" required/>
</div>

<div class="form-group">
    <label for="cf_email">@lang('website.email-address') <abbr class="required" title="required">*</abbr></label>
    <input class="form-control" id="cf_email" type="email"
           name="email" v-model="user.email"
           value="{{old('email')}}" placeholder=""
           autocomplete="email" required/>
</div>



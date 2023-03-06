<h3 id="order_review_heading w-100">@lang("website.my_orders")</h3>
<div id="order_review" class="akasha-checkout-review-order checkout-div">
    @include('frontend.src.checkout.parts.your_order')
    <input type="hidden" name="lang" value="en"/>
    <div id="payment" class="akasha-checkout-payment">
        <ul class="wc_payment_methods payment_methods methods">
            @if(isset($secret))
                <li class="wc_payment_method payment_method_cheque">
                    <input id="payment_method_cheque" type="radio" class="input-radio" checked
                           @click="showPaymentMethod('cheque')"
                           name="payment_method" value="cheque" data-order_button_text=""/>
                    <label for="payment_method_cheque">
                        Credit Card
                    </label>
                    <div :class="'paymentMethodDiv '+stripeClass()" id="payment_method_cheque_div">
                        <div class="row">
                            <div class="col-md-12 mt-2">
                                <div id="card-element">
                                    <!-- Elements will create input elements here -->
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div id="card-errors" class="text-red" role="alert"></div>
                            </div>
                            <input type="hidden" name="payment_data" value="{{json_decode($secret)->id}}">
                            <!-- We'll put the error messages in this element -->
                        </div>
                    </div>
                    @endif
                </li>
                <li class="wc_payment_method payment_method_paypal">
                    <input id="payment_method_paypal" type="radio" class="input-radio" @if(!isset($secret)) checked
                           @endif
                           name="payment_method" value="paypal" @click="showPaymentMethod('paypal')"
                           data-order_button_text="Proceed to PayPal"/>
                    <label for="payment_method_paypal">
                        PayPal
                    </label>
                    <div class="paymentMethodDiv" v-if="payment_method=='paypal'" id="payment_method_paypal_div">
                        <img src="/front/images/AM_mc_vs_ms_ae_UK.png"
                             alt="PayPal acceptance mark">
                        <p>
                            <a href="https://www.paypal.com/mk/home" class="about_paypal">
                                PayPal
                            </a>
                        </p>
                        <input type="hidden" id="pp_data" name="pp_data" value=""/>

                        <div class="payment_box payment_method_paypal" id="paypal-button-container"></div>
                    </div>
                </li>
        </ul>
        <div class="form-row place-order">
            <noscript>
                Since your browser does not support JavaScript, or it is disabled, please
                ensure you click the <em>Update Totals</em> button before placing your
                order. You may be charged more than the amount stated above if you fail to
                do so. <br/>
                <button type="submit" class="button alt"
                        name="akasha_checkout_update_totals" value="Update totals">
                    Update totals
                </button>
            </noscript>
            <div class="akasha-terms-and-conditions-wrapper">
                <div class="akasha-privacy-policy-text">
                    <p>
                        <a href="/privacy" class="akasha-privacy-policy-link"
                           target="_blank">@lang("website.privacy_policy")</a>.
                    </p>
                </div>
            </div>
            @if(isset($secret))
                <button type="submit" class="button alt text-white" name="akasha_checkout_place_order"
                        @click="showLoading()" :disabled="disable_form"
                        id="place_order" value="Place order" data-value="Place order">
                    @lang("website.pay")
                </button>
            @endif
        </div>
    </div>
</div>

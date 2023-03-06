<div class="col-lg-4 col-md-12">
    <div id="order_review" class="akasha-checkout-review-order">
        @include('frontend.src.checkout.parts.your_order')
        <input type="hidden" name="lang" value="en"/>
        <div id="payment" class="akasha-checkout-payment">
            <div class="form-row place-order">
                <button v-if="showPayment()" type="submit" class="btn place-order-btn" name="akasha_checkout_place_order"
                        @click="showLoading()"
                        id="place_order" value="Place order" data-value="Place order">
                    @lang("website.place-order")
                </button>
                <button v-else type="submit" class="btn place-order-btn" name="akasha_checkout_place_order"
                        @click="showLoading()"
                        id="place_order" value="Place order" data-value="Place order" disabled>
                    @lang("website.place-order")
                </button>
            </div>
        </div>
    </div>
</div>

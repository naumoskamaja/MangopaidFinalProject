<div class="card">
    <div class="card-header" id="Pay_Pal">
        <h5 class="title" onclick="setPaymentMethod('paypal')" data-bs-toggle="collapse"
            data-bs-target="#item4" aria-controls="item4" aria-expanded="false">PayPal <img
                src="/assets/paypal.png" alt=""> <a href="#/">What is PayPal?</a></h5>
    </div>
    <div id="item4" class="collapse" aria-labelledby="Pay_Pal" data-bs-parent="#accordion">
        <div class="card-body">
            <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
            <div class="paymentMethodDiv">
                <input type="hidden" id="pp_data" name="pp_data" value=""/>
                <div class="payment_box payment_method_paypal" id="paypal-button-container"></div>
            </div>
        </div>
    </div>
</div>

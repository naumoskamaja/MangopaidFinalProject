<div class="card">
    <div class="card-header" id="Credit_Card">
        <h5 class="title" onclick="setPaymentMethod('cheque')" data-bs-toggle="collapse"
            data-bs-target="#item5" aria-controls="item5" aria-expanded="false">Credit Card <img
                src="/assets/cc.png" alt=""> <a href="#/"></a></h5>
    </div>
    <div id="item5" class="collapse" aria-labelledby="Credit_Card" data-bs-parent="#accordion">
        <div class="card-body">
            <div class="paymentMethodDiv">
                <input type="hidden" id="cc_data" name="cc_data" value=""/>
                <div class="payment_box payment_method_paypal" id="paypal-button-container"></div>
                <div class="paymentMethodDiv" id="payment_method_cheque_div" v-if="payment_method=='cheque'">
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <input type="text" name="card_number" maxlength="16" class="form-control" style="background: #fff;" placeholder="@lang('website.card_number')" />
                        </div>
                        <div class="col-md-4 mt-2">
                            <input type="text" name="date" maxlength="2" id="date-input" class="form-control" style="background: #fff;" placeholder="MM" />
                        </div>
                        <div class="col-md-4 mt-2">
                            <input type="text" name="year" maxlength="2" class="form-control" style="background: #fff;" placeholder="YY" />
                        </div>
                        <div class="col-md-4 mt-2">
                            <input type="text" name="cvv" maxlength="3"  class="form-control" style="background: #fff;" placeholder="CVV" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

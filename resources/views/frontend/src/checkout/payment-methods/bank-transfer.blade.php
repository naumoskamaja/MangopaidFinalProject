<div class="card">
    <div class="card-header" id="direct_bank_transfer">
        <h5 class="title" onclick="setPaymentMethod('bank-transfer')" data-bs-toggle="collapse"
            data-bs-target="#itemOne" aria-controls="itemOne" aria-expanded="false">Direct bank
            transfer</h5>
    </div>
    <div id="itemOne" class="collapse" aria-labelledby="direct_bank_transfer" data-bs-parent="#accordion">
        <div class="card-body">
            <p>@lang('website.bank-transfer-description')</p>
            {{--                        insert bank account info--}}
            {{--                        <a href="/assets/gallery/bank-transfer-info.png" target="_blank" class="w-100">--}}
            {{--                            <img src="/assets/gallery/bank-transfer-info.png" alt="bank"/>--}}
            {{--                        </a>--}}
        </div>
    </div>
</div>

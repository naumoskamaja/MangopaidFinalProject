@extends('frontend.layout.app')
@section('content')
    @include('frontend.layout.parts.breadcrumb')
    @include('frontend.src.checkout.parts.checkout-area')
{{--    @include('frontend.src.checkout.paypal.paypal')--}}
@endsection
@section('footer')
    <script>
        $(document).ready(function () {
            $('form#checkout-form').bind('keypress keydown keyup', function (e) {
                if (e.keyCode == 13) {
                    e.preventDefault();
                }
            });
        });

        function setPaymentMethod(method) {
            const self = this;
            document.getElementById('paymentmethod').value = method;
            if (method == 'paypal') {
                $('#paypal-button-container').html('');
                const self = this;
                window['paypal'].Buttons({
                    localeCode: 'fr_FR',
                    style: {
                        shape: 'pill',
                        color: 'gold',
                        layout: 'horizontal',
                        label: 'paypal',
                        size: 'responsive'
                    },
                    createOrder: function (data, actions) {
                        return actions.order.create({
                            purchase_units: [{
                                "amount": {
                                    "currency_code": "EUR",
                                    // "value": self.totalToPay,
                                    "value": 10,
                                    "description": "Online payment - Order : {{date('Y-m-d H:i:s')}}"
                                }
                            }],
                            application_context: {"shipping_preference": "NO_SHIPPING"}
                        });
                    },
                    onApprove: function (data, actions) {
                        $('#myScreenLoader').removeClass('hideSection');
                        return actions.order.capture().then(function (details) {
                            if (details.status === 'COMPLETED') {
                                $('#pp_data').val(JSON.stringify(details));
                                $('#checkout-form').submit();
                            } else {
                                $('#myScreenLoader').addClass('hideSection');
                                swal("Paypal payment is not completed.");
                            }
                        });
                    },

                    onError: function (err) {
                        console.log(err);
                    }
                }).render('#paypal-button-container');
            }
        }
    </script>
@endsection


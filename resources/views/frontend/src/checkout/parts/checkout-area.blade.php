<section class="shop-checkout-area" id="checkout-process-new">
    <div class="container">
        <div class="row">
            @if(!auth()->check())
                <div class="col-md-12">
                    <div class="shop-return-login" id="returnloginAccordion">
                        <div class="card">
                            <h6>@lang('website.returning-customer')? <span data-bs-toggle="collapse"
                                                                           data-bs-target="#returnloginaccordion"> @lang('website.click-here-to-login')</span>
                            </h6>
                            <div id="returnloginaccordion" class="collapse" data-bs-parent="#returnloginAccordion">
                                <div class="card-body">
                                    <p>@lang('website.checkout-login-description')</p>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <input type="hidden" name="from_checkout" value="true">
                                        <div class="form-group">
                                            <label for="rl_username">@lang('website.email') <span
                                                    class="required">*</span></label>
                                            <input class="form-control" id="rl_username" type="text" name="email">
                                            @error('email') <span
                                                class="error text-danger">{{ $message }}</span> @enderror

                                        </div>
                                        <div class="form-group">
                                            <label for="rl_password">@lang('website.password') <span
                                                    class="required">*</span></label>
                                            <input class="form-control" id="rl_password" type="password"
                                                   name="password">
                                            @error('password') <span
                                                class="error text-danger">{{ $message }}</span> @enderror

                                        </div>
                                        <button class="btn btn-coupon w-100"
                                                type="submit">@lang('website.login')</button>
                                        <div class="remember-lostpassword">
                                            <div class="custom-control custom-checkbox">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-md-12">
                <div class="shop-checkout-coupon" id="checkoutloginAccordion">
                    <div class="card">
                        <h6>@lang('website.have-a-coupon')? <span data-bs-toggle="collapse"
                                                                  data-bs-target="#couponaccordion"> @lang('website.click-here-to-enter-your-code')</span>
                        </h6>
                        <div id="couponaccordion" class="collapse" data-bs-parent="#checkoutloginAccordion">
                            <div class="card-body">
                                @if(auth()->check())
                                    <p>@lang('website.if-you-have-a-coupon-code-please-apply-it-below')</p>
                                @else
                                    <p>@lang('website.login-first-to-apply-your-coupon-code')</p>
                                @endif
                                @if(auth()->check())
                                    <form method="post" action="/checkout/apply-coupon" enctype="multipart/form-data"
                                          novalidate="novalidate">
                                        @csrf
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="coupon"
                                                   placeholder="@lang('website.enter-your-coupon-code')">
                                            @error('coupon') <span
                                                class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <button class="btn btn-coupon">@lang('website.apply-coupon')</button>
                                    </form>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="shop-billing-form">
                <form name="checkout" method="post" class="checkout akasha-checkout" id="checkout-form"
                      action="/checkout/placeOrder"
                      enctype="multipart/form-data" novalidate="novalidate">
                    @csrf
                    @include('frontend.src.checkout.parts.billing-details')
                    {{--            @include('frontend.src.checkout.parts.your_order')--}}
                </form>
            </div>
        </div>
    </div>
    <script>
        let user = {
            fullname: null,
            email: null,
            address: null,
            country: null,
            zip: null,
            city: null,
            phone: null,
            select_point: null,
            select_point_data: null,
            live_order: null
        };
        @if(auth()->check())
            user = {
            fullname: '{!! auth()->user()->first_name !!}',
            email: '{!! auth()->user()->email !!}',
            address: '{!! auth()->user()->address !!}',
            country: '{!! auth()->user()->country !!}',
            zip: '{!! auth()->user()->zip !!}',
            city: '{!! auth()->user()->city !!}',
            phone: '{!! auth()->user()->phone !!}',
            select_point: '{!! auth()->user()->pickup_point !!}',
            select_point_data: null,
            live_order: null
        };
        @endif

        let products = [];
        @foreach(session('cart') as $product)
        products.push('{{$product['p_id']}}');
        @endforeach

        let shipping_options = {!! $conf->shipping_json !!};
        let regions = {!! json_encode( \App\Library\ConstHelper::regions) !!};
        let t = {{session('calc')['total']}};
        var app = new Vue({
            el: '#checkout-process-new',
            data() {
                return {
                    shipping: 0,
                    totalToPay: {{session('calc')['total']}},
                    total: {{session('calc')['total']}},
                    shipping_method_value: 1,
                    shipping_price: {{$conf->shipping_fee}},
                    user: user,
                    pickup_points: [],
                    selected_point: user.select_point,
                    products: products,
                    payment_method: 'cheque',
                    productsInCart: {!! json_encode(session('cart')) !!},
                    payment_allowed: true,
                    live_order_id: null,
                    live_order_email: null,
                    conf_min_price: 0,
                    conf_working_days: '',
                    conf_shipping_price: 0,
                    price: {{session('calc')['total']}},
                    totalIncludesShipping: {{session('calc')['total']}},
                    loading: false,
                    suggestedProducts: [],
                }
            },
            created() {
                if (user.country != '') {
                    this.showShippingInfo();
                }
                const self = this;
                self.changeCurrency();
            },
            // watch:{
            //     user: {
            //         handler(newValue, oldValue) {
            //             localStorage.setItem('userShippingInfo',JSON.stringify(newValue))
            //         },
            //         deep: true,
            //         immediate:false
            //     }
            // },
            methods: {
                changeCurrency() {
                    const self = this;
                    self.loading = true
                    let params = {
                        total: self.totalIncludesShipping,
                        shipping_price: self.conf_shipping_price
                    }
                    axios.post('/changeCurrency', params).then(function (res) {
                        self.totalIncludesShipping = res.data.values.total;
                        self.conf_shipping_price = res.data.values.shipping_price;
                        self.loading = false;
                    }).catch(function () {
                        console.log('error', `@lang("website.failed")`);
                        self.loading = false;
                    });

                },

                getSuggestedProductsForFreeDelivery() {
                    const self = this;
                    self.loading = true
                    let params = {
                        price: self.conf_min_price - self.total,
                    }
                    axios.post('/getSuggestedProducts', params).then(function (res) {
                        self.suggestedProducts = res.data.values;
                        if (self.suggestedProducts.length > 0)
                            document.getElementById('suggested-products-info').style.display = 'table-row';
                        self.loading = false;
                    }).catch(function () {
                        console.log('error', `@lang("website.failed")`);
                        self.loading = false;
                    });

                },

                showLoading() {
                    $('#myScreenLoader').removeClass('hideSection');
                },


                showPaymentMethod(id) {
                    const self = this;
                    this.checkStock();
                    self.payment_method = id;
                    if (id == 'paypal') {
                        setTimeout(function () {
                            self.generatePayPal();
                        }, 400);
                    }
                },

                showShippingInfo() {
                    const self = this;
                    self.getShippingValues();

                },
                getShippingValues() {
                    const self = this;
                    let min_price = 0;
                    let working_days = '';
                    let shipping_price = 0;
                    let matched = false;
                    for (let i=0;i<regions.length;i++){
                        if (self.user.country!=null && self.user.country.toLowerCase() == regions[i].toLowerCase()) {
                            min_price = shipping_options[regions[i]]['min_price'];
                            working_days = shipping_options[regions[i]]['working_days'];
                            shipping_price = shipping_options[regions[i]]['shipping_price'];
                            matched = true;
                        }
                    }
                    if (matched==false){
                        min_price = shipping_options['other']['min_price'];
                        working_days = shipping_options['other']['working_days'];
                        shipping_price = shipping_options['other']['shipping_price'];
                    }

                    if (parseFloat(self.total) >= min_price) {
                        shipping_price = 0;
                    }

                    self.conf_shipping_price = shipping_price;
                    self.conf_working_days = working_days;
                    self.conf_min_price = min_price;
                    self.totalIncludesShipping = parseFloat(self.total) + parseFloat(shipping_price);
                    self.changeCurrency();
                    if (!self.checkIfEmpty(self.user.country) && !self.checkIfEmpty(self.user.city)) {

                        if (self.conf_shipping_price != 0) {
                            self.getSuggestedProductsForFreeDelivery();
                        }
                    }
                },

                showPayment() {
                    const self = this;
                    let flag = true;

                    if (self.checkIfEmpty(self.user.fullname) || self.checkIfEmpty(self.user.email) || self.checkIfEmpty(self.user.address) || self.checkIfEmpty(self.user.country) || self.checkIfEmpty(self.user.zip) ||
                        self.checkIfEmpty(self.user.city) || self.checkIfEmpty(self.user.phone)) {
                        flag = false;
                    }

                    if (self.shipping_method_value == 2) {
                        if (self.selected_point == null) {
                            flag = false;
                        }
                        self.user.select_point = self.selected_point;
                    }

                    if (!self.payment_allowed) {
                        flag = false;
                    }
                    return flag;
                },
                async checkStock() {
                    const self = this;
                    await axios.post('/checkProductStock', {items: JSON.stringify(self.productsInCart)}).then((res) => {
                        if (!res.data.values) {
                            self.payment_allowed = false;
                            showToast('error', 'One of products is out of stock.');
                        }
                    });
                },
                checkIfEmpty(val, key = null) {
                    if (val == ' ' || val == '' || val == '  ' || val == 'null' || val == '-' || val == null || val.length <= 1) {
                        return true;
                    }
                    return false;
                },
                selectPoint(point, pointData) {
                    this.selected_point = point;
                    this.user.select_point = self.selected_point;
                    this.user.select_point_data = pointData;
                },
                selectPickupPoint() {
                    const self = this;
                    self.pickup_points.map(function (item) {
                        if (item.Num == self.user.select_point) {
                            self.user.select_point_data = item;
                        }
                    });
                },

                checkShippingMethod(i) {
                    if (i == this.shipping_method_value) {
                        return ' selectedBox';
                    }
                },
                generatePayPal() {
                    $('#paypal-button-container').html('');
                    const self = this;
                    window['paypal'].Buttons({
                        localeCode: 'fr_FR',
                        style: {
                            shape: 'pill',
                            color: 'gold',
                            layout: 'horizontal',
                            label: 'paypal',
                        },
                        createOrder: function (data, actions) {
                            return actions.order.create({
                                purchase_units: [{
                                    "amount": {
                                        "currency_code": "EUR",
                                        "value": self.totalToPay,
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
                                    $('#checkout-form-payment').val('paypal');
                                    $('#checkout-form').submit();
                                } else {
                                    $('#myScreenLoader').addClass('hideSection');
                                    $('#myScreenLoader').addClass('hideSection');
                                    swal("Le paiement Paypal n'est pas terminé.");
                                }
                            });
                        },

                        onError: function (err) {
                            console.log(err);
                        }
                    }).render('#paypal-button-container');
                }
            },

        });
    </script>
    <style>
        .loader {
            border: 16px solid #f3f3f3;
            border-top: 16px solid #3498db;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            animation: spin 2s linear infinite;
        }

        .loaderContainer {
            position: absolute;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            align-content: center;
            background: rgba(0, 0, 0, 0.5);
        }
    </style>

</section>
{{--@include('frontend.src.checkout.payment.paypal')--}}


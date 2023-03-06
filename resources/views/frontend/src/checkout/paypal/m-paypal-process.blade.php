{{--@extends('front.src.checkout.payment.mobile-paypal')--}}
{{--@section('content')--}}
{{--    <div class="banner-wrapper has_background breadcrumb-style">--}}
{{--        <div class="banner-wrapper-inner">--}}
{{--            <h1 class="page-title">@lang("website.checkout")</h1>--}}
{{--            <div role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">--}}
{{--                <ul class="trail-items breadcrumb">--}}
{{--                    <li class="trail-item trail-begin"><a href="/"><span>@lang("website.home")</span></a></li>--}}
{{--                    <li class="trail-item trail-end active"><span>@lang("website.payment")</span>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <main class="site-main main-container no-sidebar" id="checkout-process">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="main-content col-md-12">--}}
{{--                    <div class="page-main-content">--}}
{{--                        <div class="akasha">--}}
{{--                            <div class="akasha-notices-wrapper"></div>--}}

{{--                            <form name="checkout" method="post" class="checkout akasha-checkout" id="checkout-form"--}}
{{--                                  enctype="multipart/form-data" novalidate="novalidate">--}}
{{--                                @csrf--}}

{{--                                @include('front.src.checkout.payment.payment-2')--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </main>--}}

{{--    @include('front.src.checkout.payment.paypal')--}}

{{--@endsection--}}
{{--@section('footer')--}}

{{--    <script>--}}
{{--        let user = {--}}
{{--            fullname:null,--}}
{{--            email:null,--}}
{{--            address:null,--}}
{{--            country:null,--}}
{{--            zip:null,--}}
{{--            city:null,--}}
{{--            phone:null,--}}
{{--            select_point:null,--}}
{{--            select_point_data:null--}}
{{--        };--}}
{{--        @if(auth()->check())--}}
{{--            user = {--}}
{{--            fullname:'{!! auth()->user()->name !!}',--}}
{{--            email:'{!! auth()->user()->email !!}',--}}
{{--            address:'{!! auth()->user()->address !!}',--}}
{{--            country:'{!! auth()->user()->country !!}',--}}
{{--            zip:'{!! auth()->user()->zip !!}',--}}
{{--            city:'{!! auth()->user()->city !!}',--}}
{{--            phone:'{!! auth()->user()->phone !!}',--}}
{{--            select_point:'{!! auth()->user()->pickup_point !!}',--}}
{{--            select_point_data:null,--}}
{{--        };--}}
{{--        @endif--}}

{{--        let products = [];--}}
{{--        <?php--}}
{{--        $prods = [];--}}
{{--        if (isset($order)) {--}}
{{--            foreach ($order->items as $i) {--}}
{{--                $prods[] = [--}}
{{--                    "p_id" => $i->product->id,--}}
{{--                    "title" => $i->product->name,--}}
{{--                    "quantity" => $i->qty,--}}
{{--                    "price" => $i->price,--}}
{{--                    'image' => null--}}
{{--                    ];--}}
{{--                if (isset($i->product->images[0]))--}}
{{--                    $prods['image'] = $i->product->images[0];--}}
{{--            }--}}
{{--        }--}}
{{--        ?>--}}
{{--        @if(isset($order))--}}
{{--        @foreach($prods as $product)--}}

{{--        products.push('{{$product['p_id']}}');--}}
{{--        @endforeach--}}
{{--        @else--}}
{{--        @foreach(session('cart') as $product)--}}
{{--        products.push('{{$product['p_id']}}');--}}
{{--        @endforeach--}}
{{--        @endif--}}
{{--        //pk_test_kFdbSpax8iJfYoYPPI1Qua8Z--}}

{{--        var app = new Vue({--}}
{{--            el: '#checkout-process',--}}
{{--            data(){--}}
{{--                return {--}}
{{--                    shipping:0,--}}
{{--                    totalToPay:{{$order->total}},--}}
{{--                    total:{{$order->total}},--}}
{{--                    shipping_method_value:1,--}}
{{--                    shipping_price:0,--}}
{{--                    user:user,--}}
{{--                    pickup_points: [],--}}
{{--                    selected_point:user.select_point,--}}
{{--                    products:products,--}}
{{--                    payment_method:'paypal',--}}
{{--                    card: null,--}}
{{--                    @if(isset($order))--}}
{{--                    productsInCart: {!! json_encode($prods) !!},--}}
{{--                    @else--}}
{{--                    productsInCart:{!! json_encode(session('cart')) !!},--}}
{{--                    @endif--}}
{{--                    payment_allowed:true,--}}
{{--                    disable_form: false,--}}
{{--                    pp_details: null,--}}
{{--                    stripe_passed: false--}}
{{--                }--}}
{{--            },--}}
{{--            watch:{--}}
{{--                user:{--}}
{{--                    deep:true,--}}
{{--                    handler(newVal,oldVal){--}}
{{--                        if(newVal.country=='Allemagne' ||newVal.country=='Suisse'){--}}
{{--                            this.changeShippingToColissimo();--}}
{{--                        }--}}
{{--                        // this.showPayment();--}}
{{--                    }--}}
{{--                },--}}
{{--                shipping_method_value:{--}}
{{--                    handler(){--}}
{{--                        this.calculateShipping();--}}
{{--                    }--}}
{{--                }--}}
{{--            },--}}
{{--            methods: {--}}
{{--                showLoading(){--}}
{{--                    let self = this;--}}
{{--                    $('#myScreenLoader').removeClass('hideSection');--}}
{{--                },--}}
{{--                changeShippingToColissimo(){--}}
{{--                    this.shipping_method_value=1;--}}
{{--                    this.user.select_point = null;--}}
{{--                    this.user.select_point_data = null;--}}
{{--                },--}}
{{--                showPaymentMethod(id){--}}
{{--                    const self = this;--}}
{{--                    this.checkStock();--}}
{{--                    self.payment_method = id;--}}
{{--                    if(id=='paypal'){--}}
{{--                        setTimeout(function(){--}}
{{--                            self.generatePayPal();--}}
{{--                        },400);--}}
{{--                    }--}}
{{--                },--}}
{{--                calculateShipping(){--}}
{{--                    const self = this;--}}
{{--                    axios.post('/getShippingPrice', {products: JSON.stringify(self.products),shipping:self.shipping_method_value,country:self.user.country}).then((res)=> {--}}
{{--                        console.log(res.data);--}}
{{--                        self.shipping_price = res.data.values;--}}
{{--                        self.totalToPay = self.total + self.shipping_price;--}}
{{--                    });--}}
{{--                },--}}
{{--                showPayment(){--}}
{{--                    const self = this;--}}

{{--                    if(self.checkIfEmpty(self.user.fullname) || self.checkIfEmpty(self.user.email) || self.checkIfEmpty(self.user.address) || self.checkIfEmpty(self.user.country) || self.checkIfEmpty(self.user.zip) ||--}}
{{--                        self.checkIfEmpty(self.user.city) ||self.checkIfEmpty(self.user.phone)){--}}
{{--                        return false;--}}
{{--                    }--}}

{{--                    if(self.shipping_method_value==2){--}}
{{--                        if(self.selected_point==null){--}}
{{--                            return false;--}}
{{--                        }--}}
{{--                        self.user.select_point=self.selected_point;--}}
{{--                    }--}}

{{--                    if(!self.payment_allowed){--}}
{{--                        return false;--}}
{{--                    }--}}
{{--                    return true;--}}
{{--                },--}}
{{--                async checkStock(){--}}
{{--                    const self = this;--}}
{{--                    await axios.post('/checkProductStock',{items:JSON.stringify(self.productsInCart)}).then((res)=> {--}}
{{--                        if (!res.data.values) {--}}
{{--                            self.payment_allowed = false;--}}
{{--                            showToast('error','One of products is out of stock.');--}}
{{--                        }--}}
{{--                    });--}}
{{--                },--}}
{{--                checkIfEmpty(val, key=null){--}}
{{--                    if(val == ' ' || val=='' || val=='  ' || val=='null' || val=='-' || val==null || val.length<=1 ){--}}
{{--                        return true;--}}
{{--                    }--}}
{{--                    return false;--}}
{{--                },--}}
{{--                selectPoint(point, pointData){--}}
{{--                    this.selected_point = point;--}}
{{--                    this.user.select_point=self.selected_point;--}}
{{--                    this.user.select_point_data=pointData;--}}
{{--                },--}}
{{--                selectPickupPoint(){--}}
{{--                    const self = this;--}}
{{--                    self.pickup_points.map(function(item){--}}
{{--                        if(item.Num==self.user.select_point){--}}
{{--                            self.user.select_point_data = item;--}}
{{--                        }--}}
{{--                    });--}}
{{--                },--}}
{{--                getPickupPoint(){--}}
{{--                    const self = this;--}}
{{--                    self.shipping_method_value=2;--}}

{{--                    if(self.user.zip==null && self.checkIfEmpty(self.user.zip)){--}}
{{--                        swal('Postal code is required.');--}}
{{--                        self.shipping_method_value=1;--}}
{{--                        return '';--}}
{{--                    }--}}
{{--                    axios.post('/getPickupPoints', {zip: self.user.zip, country:self.user.country}).then((res)=> {--}}
{{--                        if (res.data.status) {--}}
{{--                            self.pickup_points = res.data.values;--}}
{{--                            self.selectPickupPoint();--}}
{{--                        }--}}
{{--                    }).catch(err=> {--}}
{{--                        self.shipping_method_value=1;--}}
{{--                        swal("Une erreur s'est produite, contactez l'administrateur.");--}}
{{--                    })--}}
{{--                },--}}
{{--                checkShippingMethod(i){--}}
{{--                    if(i==this.shipping_method_value){--}}
{{--                        return ' selectedBox';--}}
{{--                    }--}}
{{--                },--}}
{{--                generatePayPal(){--}}
{{--                    $('#paypal-button-container').html('');--}}
{{--                    const self = this;--}}
{{--                    window['paypal'].Buttons({--}}
{{--                        localeCode: 'fr_FR',--}}
{{--                        style: {--}}
{{--                            shape: 'pill',--}}
{{--                            color: 'gold',--}}
{{--                            layout: 'horizontal',--}}
{{--                            label: 'paypal',--}}
{{--                            size: 'responsive'--}}
{{--                        },--}}
{{--                        createOrder: function(data, actions) {--}}
{{--                            return actions.order.create({--}}
{{--                                purchase_units: [{--}}
{{--                                    "amount":{--}}
{{--                                        "currency_code":"EUR",--}}
{{--                                        "value": self.totalToPay,--}}
{{--                                        "description": "Online payment - Order : {{date('Y-m-d H:i:s')}}"--}}
{{--                                    }--}}
{{--                                }],--}}
{{--                                application_context: {"shipping_preference": "NO_SHIPPING"}--}}
{{--                            });--}}
{{--                        },--}}
{{--                        onApprove: function(data, actions) {--}}
{{--                            $('#myScreenLoader').removeClass('hideSection');--}}
{{--                            return actions.order.capture().then(function(details) {--}}
{{--                                if (details.status === 'COMPLETED') {--}}
{{--                                    $('#pp_data').val(JSON.stringify(details));--}}
{{--                                    axios.post('/api/V1/finishOrder/{{$order->id}}', {pp_data: JSON.stringify(details)}).then((res) => {--}}
{{--                                        window.close();--}}
{{--                                    });--}}
{{--                                } else {--}}
{{--                                    $('#myScreenLoader').addClass('hideSection');--}}
{{--                                    swal("Le paiement Paypal n'est pas terminé.");--}}
{{--                                }--}}
{{--                            });--}}
{{--                        },--}}

{{--                        onError: function(err) {--}}
{{--                            console.log(err);--}}
{{--                        }--}}
{{--                    }).render('#paypal-button-container');--}}
{{--                }--}}
{{--            },--}}
{{--            created() {--}}
{{--                self = this;--}}
{{--                setTimeout(function () {--}}
{{--                    self.generatePayPal();--}}
{{--                }, 200);--}}
{{--                this.calculateShipping();--}}
{{--                if(!this.checkIfEmpty(this.user.select_point)){--}}
{{--                    this.getPickupPoint();--}}
{{--                }--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            $('form#checkout-form').bind('keypress keydown keyup', function(e){--}}
{{--                if(e.keyCode == 13) { e.preventDefault(); }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}

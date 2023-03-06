<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Library\CommonHelper;
use App\Library\ConfigurationHelper;
use App\Library\LibHelper;
use App\Library\ProductsHelper;
use App\Mail\ReceivedOrder;
use App\Mail\SuccessfulOrder;
use App\Models\Client;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PageBanner;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\SectionBanner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{

    public function checkout()
    {
        if (!session('cart')) {
            return redirect('/cart');
        }
        $page = 'checkout';
        $carts = [];
        foreach (session('cart') as $c) {
            $carts[] = $c['p_id'];
        }
        $total_discount = ProductsHelper::get_cart_totals(session('cart'))['discount'];
        $old_total = ProductsHelper::get_cart_totals(session('cart'))['old_subtotal'];
        $new_subtotal = ProductsHelper::get_cart_totals(session('cart'))['subtotal'];
        session()->put('calc', ['totalNoDiscount' => $old_total, 'total' => $new_subtotal, 'subtotal' => $new_subtotal]);
        $conf = ConfigurationHelper::getConfig();
        $main_categories = ConfigurationHelper::get_main_categories();
        $banner = PageBanner::where('page', $page . '_page')->whereStatus(1)->first();

        return view('frontend.src.checkout.checkout', compact('main_categories', 'conf', 'banner', 'page'));
    }


    public function applyCoupon()
    {
        $prods = session('cart');
        \request()->validate([
            'coupon' => 'required'
        ]);
        $code = request('coupon');
        $coupon = Coupon::where('status', 1)->where('code', $code)->where("end_date", ">=", date("Y-m-d"))->where("start_date", "<=", date("Y-m-d"))->where('nr', '>', 0)->first();

        if (auth()->user()) {
            $client = auth()->user();
        } else {
            $client = new Client();
            $client->id = 0;
        }


        $carts = [];
        foreach (session('cart') as $c) {
            $carts[] = $c['p_id'];
        }
//        update discount
        $total_discount = ProductsHelper::get_cart_totals(session('cart'))['discount'];
        $old_total = ProductsHelper::get_cart_totals(session('cart'))['old_subtotal'];
        $new_subtotal = ProductsHelper::get_cart_totals(session('cart'))['subtotal'];
        $totalWithCouponDiscount = LibHelper::calculateDiscount($new_subtotal, $coupon, true);
        $total = $totalWithCouponDiscount;
        $subtotal = $new_subtotal; //category and product actions are included
        $discount = $old_total - $totalWithCouponDiscount;

        session()->put('calc', ['totalNoDiscount' => $old_total, 'total' => $total, 'subtotal' => $subtotal, 'discount' => $discount, 'coupon' => $coupon]);

        if ($coupon == null || (int)$coupon->nr == 0 || $discount == 0) {
            return redirect('/checkout')->with('error', __('website.invalid-coupon-code'));
        }
        $page = 'checkout';
        $banner = PageBanner::where('page', $page . '_page')->whereStatus(1)->first();

        return view('frontend.src.checkout.checkout', compact('banner'));
    }

    public function placeOrder()
    {
        foreach (session('cart') as $i) {
            if (!ProductsHelper::check_stock_selected($i['p_id'], $i['size'], $i['quantity']))
                return redirect()->back()->with('error', __('website.one-of-products-is-out-of-stock'));
        }

        $conf = ConfigurationHelper::getConfig();
        if (auth()->check()) {
            $user = auth()->user();
        } else {
            $user = new \stdClass();
            $user->id = 0;
        }

        $user->name = request('name');
        $user->email = request('email');

        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'city' => 'required',
            'address' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'zip' => 'required',
            'payment' => 'required',

        ]);
        $user->city = request('city');
        $user->address = request('address');
        $user->country = request('country');
        $user->phone = request('phone');
        $user->zip = request('zip');

        $price = 0;
//            $single_shipping = request('form_shipping');
        $prods = session('cart');

        $total_discount = ProductsHelper::get_cart_totals(session('cart'))['discount'];
        $old_total = ProductsHelper::get_cart_totals(session('cart'))['old_subtotal'];
        $new_subtotal = ProductsHelper::get_cart_totals(session('cart'))['subtotal'];


        session('calc')['total'] = $new_subtotal;

        $shipping_price = \App\Library\CheckoutHelper::calculateShipping($user->country)['shipping_price'];
        $min_price_free_shipping = \App\Library\CheckoutHelper::calculateShipping($user->country)['min_price'];
        $total = session('calc')['total'];
        if ($total >= $min_price_free_shipping) {
            $shipping_price = 0;
        }
        $total = session('calc')['total'] + (float)$shipping_price;
        $subtotal = session('calc')['subtotal'];
        try {
            DB::beginTransaction();

            $order = new Order();
            $order->total = (float)$total;
            $order->subtotal = (float)$subtotal;
            $order->client_id = $user->id;
            $order->email = $user->email;
            $order->name = $user->name;
            $order->address = $user->address;
            $order->city = $user->city;
            $order->country = $user->country;
            $order->zip = $user->zip;
            $order->phone = $user->phone;
            $order->user_ip_address = request()->ip();
            $order->payment_method = request('payment');
            $order->comment = request('description');
            $order->shipping_method = 'Delivery';
            $order->shipping_price = (float)$shipping_price;
            $order->status = 0; //pending
            $order->coupon = ''; //initial
            $order->discount = $total_discount; //initial
//            $order->payment_method = 'undefined';


            if (isset(session('calc')['coupon']) && session('calc')['coupon'] != null) {
                $c = session('calc')['coupon'];
                $coupon = Coupon::where('status', 1)->where('code', $c->code)->where("end_date", ">=", date("Y-m-d"))->where("start_date", "<=", date("Y-m-d"))->where('nr', '>', 0)->first();
                if ($coupon != null) {
                    $coupon->nr = $coupon->nr - 1;
                    $coupon->save();
                    $order->coupon = $coupon;
                    if (isset(session('calc')['discount'])) {
                        //after applying coupon code
                        $order->discount = session('calc')['discount'];
                    }
                }
            }

            $order->save();

            foreach ($prods as $prod) {
                $oldPrice = \App\Library\ProductsHelper::get_product_price($prod['p_id'])['oldPrice'];
                $newPrice = \App\Library\ProductsHelper::get_product_price($prod['p_id'])['newPrice'];
                $oldPrice = \App\Library\ProductsHelper::get_product_price($prod['p_id'])['oldPrice'];
                $prodDiscount = \App\Library\ProductsHelper::get_product_price($prod['p_id'])['discount'];

                $product = Product::find($prod['p_id']);
                $product->count_ordered += (int)$prod['quantity'];
                $product->save();
                $item = new OrderItem();
                $item->order_id = $order->id;
                $item->qty = $prod['quantity'];
                $item->product_id = $prod['p_id'];
                $item->price = $newPrice;
                $item->total = $newPrice * (int)$prod['quantity'];
                $item->discount = $prodDiscount;
                $item->attributes = null;
                $item->size = $prod['size'];
                $item->image = $prod['image'];
                $item->sku = $prod['code'];

                $item->save();
                $selectedSize = $prod['size'];
                if ($selectedSize != '') {
                    $size = ProductSize::where('product_id', $prod['p_id'])->where('size', $selectedSize)->first();
                    if ($size != null) {
                        //set size
                        $item->size = $selectedSize;
                        $item->save();
                    }

                    //decrement stock
                    if ($item->size != '') {
                        $size = ProductSize::where('product_id', $prod['p_id'])->where('size', $selectedSize)->first();
                        $size->stock = (int)$size->stock - (int)$prod['quantity'];
                        $size->save();

                    }
                } else {
                    $product->stock = (int)$product->stock - (int)$prod['quantity'];
                    $product->save();
                }
            }

            if (request('payment') == 'cheque') {
                request()->validate([
                    'card_number' => ['required'],
                    'date' => ['required'],
                    'year' => ['required'],
                    'cvv' => ['required'],
                ]);

                $stripe = \Cartalyst\Stripe\Stripe::make(env('STRIPE_SECRET'));
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => request('card_number'),
                        'exp_month' => request('date'),
                        'exp_year' => request('year'),
                        'cvc' => request('cvv')
                    ]
                ]);
                if (!isset($token['id'])) {
                    DB::rollBack();
                    return redirect()->back()->with('error', 'The stripe token was not generated correctly!');
                }
                $customer = $stripe->customers()->create([
                    'name' => request('name'),
                    'email' => request('email'),
                    'phone' => request('phone'),
                    'address' => [
                        'line1' => request('address'),
                        'postal_code' => request('zip'),
                        'city' => request('city'),
                        'country' => request('country'),
                    ],
                    'shipping' => [
                        'name' => request('name'),
                        'address' => [
                            'line1' => request('address'),
                            'postal_code' => request('zip'),
                            'city' => request('city'),
                            'country' => request('country'),
                        ],
                    ],
                    'source' => $token['id']
                ]);
                $charge = $stripe->charges()->create([
                    'customer' => $customer['id'],
                    'currency' => 'eur',
                    'amount' => $order->total,
                    'description' => 'Payment for order no ' . $order->id
                ]);
                if ($charge['status'] != 'succeeded') {
                    throw new \Exception();
//                    DB::rollBack();
//                    return redirect()->back()->with('error', 'Error in Transaction!');
                } else {
                    $order->payment_id = $charge['id'];
                    $order->status = 1;
                    $order->save();
                }
            }

        }
        catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Error in Transaction!');
        } finally {
            DB::commit();
        }

        $pageUrl = url()->to("/");
        $myData = [
            'order' => $order,
            'user' => $user,
            'conf' => $conf,
            'pageUrl' => $pageUrl
        ];

        Mail::to($user->email)->send(new SuccessfulOrder($myData));
        Mail::to($conf->email)->send(new ReceivedOrder($myData));
        session()->put('cart', []);
        session()->put('wishlist', []);

        DB::commit();
        return redirect('/successOrdered')->with('success', 'Good choice! Your order was successful!');

    }

    public function successOrdered()
    {
        $banner = PageBanner::where('page', 'checkout_page')->whereStatus(1)->first();
        return view('frontend.src.checkout.order-completed-page.order-completed', compact('banner'));
    }


}

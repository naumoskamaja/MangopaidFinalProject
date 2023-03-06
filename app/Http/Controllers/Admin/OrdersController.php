<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\ConfigurationHelper;
use App\Mail\SuccessfulOrder;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrdersController extends Controller
{
    public function list()
    {
        $search = request('search');
        $orders = Order::sortable()->paginate(15);
        $page = 'orders';

        if ($search != "") {
            $orders = Order::where(function ($query) use ($search) {
                $query->where('status', 'like', '%' . $search . '%')
                    ->orWhere('id', 'like', '%' . $search . '%');
            })
                ->sortable()->paginate(15);
            $orders->appends(['search' => $search]);
        }
        return view('admin.src.orders.list', compact('orders', 'search', 'page'));
    }

    public function change_order_status($id, $status)
    {
        $order = Order::where('id', $id)->with('items')->first();
        $order->status = (int)$status;
        $order->save();

        //increment qty - unsuccessful order
        if ((int)$status == 5) {
            foreach ($order->items as $item) {
                if ($item->size != '') {
                    $size = ProductSize::where('product_id', $item->product_id)->where('size', $item->size)->first();
                    if (isset($size) && $size != null) {
                        $size->stock = (int)$size->stock + (int)$item->qty;
                        $size->save();
                    }
                } else {
                    $product = Product::findOrFail($item->product_id);
                    $product->stock = (int)$product->stock + (int)$item->qty;
                    $product->save();
                }
            }
        }


        $userName = $order->name;
        $userEmail = $order->email;
        $conf = ConfigurationHelper::getConfig();

        $pageUrl = url()->to("/");
        $myData = [
            'order' => $order,
            'userName' => $userName,
            'userEmail' => $userEmail,
            'conf' => $conf,
            'pageUrl' => $pageUrl

        ];

        Mail::to($userEmail)->send(new SuccessfulOrder($myData));
        return redirect()->back()->with('success', 'Action performed successfully!');
    }


    public function invoice($id)
    {
        $order = Order::findOrFail($id);
        $page = 'invoice';

        return view('admin.src.orders.invoice', compact('order', 'page'));
    }
}

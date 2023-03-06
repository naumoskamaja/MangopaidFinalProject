<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Library\ConfigurationHelper;
use App\Models\Order;
use App\Models\PageConfig;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function show_invoice($id)
    {
        $user = auth()->user();
        $order = Order::whereId($id)->first();
        return view('profile.src.invoice.invoice', compact('user', 'order'));
    }

    public function download_invoice($id)
    {
        $conf = ConfigurationHelper::getConfig();
        $user = auth()->user();
        $order = Order::where('client_id', $user->id)->where('id', $id)->with('items')->first();
        if ($order == null)
            return $this->returnData(false, 'This order does not exist', null);
        $data = [];
        $data['conf'] = $conf;
        $data['user'] = $user;
        $data['order'] = $order;
        $filename = '/invoice_' . request('id') . '.pdf';
        $path = base_path() . '/public/' . $user->id . '/pdf';
        if (file_exists($path . $filename)) {
            unlink($path . $filename);
        }
        if (!file_exists($path)) {
            mkdir($path, 0775, true);
        }
        $return_path = asset('/public/' . $user->id . '/pdf') . $filename;
        $pdf = SnappyPdf::loadView('profile.pdf.invoice', $data)->save($path . $filename);
        return $pdf->inline();
    }

}

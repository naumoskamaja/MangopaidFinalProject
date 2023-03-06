<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\LibHelper;
use App\Models\ActionProduct;
use App\Models\Product;

class ActionProductController extends Controller
{
    public function list()
    {
        $search = request('search');
        $actions = ActionProduct::sortable()->paginate(15);
        $page = 'action-products';

        if ($search != "") {
            $actions = ActionProduct::where(function ($query) use ($search) {
                $query->where('product_id', 'like', '%' . $search . '%')
                    ->orWhere('id', 'like', '%' . $search . '%');
            })
                ->sortable()->paginate(15);
            $actions->appends(['search' => $search]);
        }
        return view('admin.src.action-products.list', compact('actions', 'search', 'page'));
    }

    public function add()
    {
        $page = 'add-action-product';
        $products = Product::where('status', 1)->get();
        return view('admin.src.action-products.add', compact('page', 'products'));
    }

    public function store()
    {
        request()->validate([
            'product_id' => ['required'],
            'old_price' => ['required'],
            'new_price' => ['required'],
            'valid_till' => ['required'],
        ]);
        if (\request('action_id') == 0) {
            $action = new ActionProduct();
        } else {
            $action = ActionProduct::findOrFail(\request('action_id'));
        }
        $action->product_id = \request('product_id');
        $action->old_price = \request('old_price');
        $action->new_price = \request('new_price');
        $action->valid_till = \request('valid_till');
        $action->discount = \request('old_price') - \request('new_price');
        $action->save();

        return redirect('/admin/actions')->with('success', 'Action performed successfully!');
    }

    public function edit($id)
    {
        $page = 'edit-action-product';
        $products = Product::where('status', 1)->get();
        $action = ActionProduct::findOrFail($id);
        return view('admin.src.action-products.add', compact('action', 'page', 'products'));
    }

    public function change_status($id, $status)
    {
        $action = ActionProduct::findOrFail($id);
        $redirect_page = 'actions';

        return LibHelper::change_status($action, $status,$redirect_page);
    }
}

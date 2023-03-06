<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\ImageHelper;
use App\Library\LibHelper;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function list()
    {
        $search = request('search');
        $coupons = Coupon::sortable()->paginate(15);
        $page = 'coupons';

        if ($search != "") {
            $coupons = Coupon::where(function ($query) use ($search) {
                $query->where('code', 'like', '%' . $search . '%')
                    ->orWhere('id', 'like', '%' . $search . '%');
            })
                ->sortable()->paginate(15);
            $coupons->appends(['search' => $search]);
        }
        return view('admin.src.coupons.list', compact('coupons', 'search', 'page'));
    }

    public function add()
    {
        $page = 'add-coupon';
        return view('admin.src.coupons.add', compact('page'));
    }

    public function store()
    {
        if (request('coupon_id') == 0){
            $coupon = new Coupon();
        }
        else{
            $coupon = Coupon::findOrFail(request('coupon_id'));
        }

        $coupon->code = request('code');
        $coupon->type = request('type');
        $coupon->value = request('value');
        $coupon->start_date = request('start_date');
        $coupon->end_date = request('end_date');
        $coupon->nr = request('nr');

        if (request()->hasFile("image") && request()->file("image")->isValid()) {
            $url = ImageHelper::uploadFile(request('image'), base_path('/public/assets/uploaded_gallery/coupons'));
            $coupon->image = 'assets/uploaded_gallery/coupons/' . $url[0];
        }


//        check if there is a coupon with the same code as current coupon
        if (!LibHelper::check_unique_coupon_code(request('coupon_id'), request('code')))
            return redirect()->back()->with('error', __('website.this-coupon-code-has-already-been-taken'));

        $coupon->save();
        return redirect('/admin/coupons')->with('success', __('website.action-performed-successfully'));

    }

    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        $page = 'edit-coupon';
        return view('admin.src.coupons.add', compact('coupon', 'page'));
    }

    public function change_status($id, $status)
    {
        $coupon = Coupon::findOrFail($id);
        $redirect_page = 'coupons';
        return LibHelper::change_status($coupon, $status, $redirect_page);
    }
}

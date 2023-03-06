<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\LibHelper;
use App\Models\Review;

class ReviewController extends Controller
{
    public function show()
    {
        $search = request('search');
        $reviews = Review::sortable()->paginate(15);
        $page = 'reviews';

        if ($search != "") {
            $reviews = Review::where(function ($query) use ($search) {
                $query->where('first_name', 'like', '%' . $search . '%')
                    ->orWhere('rate', 'like', '%' . $search . '%')
                    ->orWhere('product_id', 'like', '%' . $search . '%');
            })
            ->sortable()->paginate(15);
            $reviews->appends(['search' => $search]);
        }
        return view('admin.src.reviews.reviews', compact('reviews', 'search', 'page'));
    }


    public function change_status($id, $status)
    {
        $review = Review::findOrFail($id);
        $redirect_page = 'reviews';
        return LibHelper::change_status($review, $status, $redirect_page);
    }
}

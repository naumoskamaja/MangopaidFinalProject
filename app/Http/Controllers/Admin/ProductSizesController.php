<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductSize;
use Illuminate\Http\Request;

class ProductSizesController extends Controller
{
    public function save($product_id)
    {
        $product = Product::findOrFail($product_id);
        if (request('size') == '')
            return $this->returnData(500, 'Size Field is required', []);
        if (request('stock') == '')
            return $this->returnData(500, 'Stock Field is required', []);
        $size = ProductSize::where('product_id', $product_id)->where('size', request('size'))->first();

        if ($size == null) {
            $size = new ProductSize();
            $size->product_id = $product_id;
            $size->size = request('size');
        }
        $size->stock = request('stock');
        $size->status = 1;
        $size->save();

        $sizes = ProductSize::where('product_id', $product_id)->where('status', 1)->get();
        return $this->returnData(200, 'Action performed successfully!', $sizes);
    }

    public function delete($product_id, $size_id)
    {
        $product = Product::findOrFail($product_id);
        $size = ProductSize::where('product_id', $product_id)->where('id', $size_id)->first();
        if ($size == null)
            return $this->returnData(404, 'Size not found.', null);

        $size->status = 0;
        $size->save();
        $sizes = ProductSize::where('product_id', $product_id)->where('status', 1)->get();
        return $this->returnData(200, 'Action performed successfully!', $sizes);
    }
}

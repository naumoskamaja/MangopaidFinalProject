<?php

namespace App\Library;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductSize;

class ProductsHelper
{
    static function getActiveProducts()
    {
        $products = Product::whereStatus(1)->get();
        return $products;

    }

    static function tagsString($tags)
    {
        $string = '';
        foreach ($tags as $key => $tag) {
            $string .= $tag->tag;
            if (count($tags) > $key + 1) {
                $string .= ',';
            }
        }
        return $string;
    }

    static function get_stock_colored_message($product_id, $size)
    {
        $product = Product::where('id', $product_id)->with('sizes')->first();

        $color = 'text-danger';
        $product_status = '';
        if ((count($product->sizes) == 0)) {
            if ($product->stock == 0) {
                $product_status = 'out_of_stock';
                $color = 'text-danger';
            } elseif ($product->stock > 3) {
                $product_status = 'in_stock';
                $color = 'text-success';
            } elseif ($product->stock <= 3) {
                $product_status = 'low_in_stock';
                $color = 'text-warning';
            }
        } else {
            $prodSize = ProductSize::where('product_id', $product_id)->where('size', $size)->first();
            if(isset($prodSize)){
                if ($prodSize->stock == 0) {
                    $product_status = 'out_of_stock';
                    $color = 'text-danger';
                } elseif ($prodSize->stock > 3) {
                    $product_status = 'in_stock';
                    $color = 'text-success';
                } elseif ($prodSize->stock > 0 && $prodSize->stock <= 3) {
                    $product_status = 'low_in_stock';
                    $color = 'text-warning';
                }
            }
        }

        $returnData = [
            'product_status' => $product_status,
            'color' => $color,
        ];

        return $returnData;


    }

    static function checkStockStatus($id)
    {
        $product = Product::where('id', $id)->with('sizes')->first();
        if ($product == null)
            abort(404);

        $flag = false;
        if (count($product->sizes) > 0) {
            foreach ($product->sizes as $size) {
                if ((int)$size->stock > 0)
                    $flag = true;
            }
        } else if ((int)$product->stock > 0)
            $flag = true;
        return $flag;
    }

    static public function check_stock_selected($product_id, $size, $stock)
    {
        $product = Product::find($product_id);
        $selectedSize = '';
        if ($size != null) {
            $selectedSize = ProductSize::where('product_id', $product->id)->where('size', $size)->first();
            if ($selectedSize->stock >= $stock)
                return true;
        } else {
            if ($product->stock >= $stock)
                return true;
        }
        return false;
    }


    static function get_image($image)
    {
        if (isset($image) && $image != null)
            $img = asset($image);
        else
            $img = '/assets/noimg.png';
        return $img;

    }

    static function get_product_image($product)
    {
        if (isset($product->images[0])) {
            if ($product->images[0]->image != null)
                $img = asset($product->images[0]->image);
            else
                $img = asset($product->images[0]->thumbnail);
        } else
            $img = '/assets/noimg.png';
        return $img;
    }

    static function checkIfProductInWishlist($product)
    {
        if (session('wishlist') != null) {
            foreach (session('wishlist') as $id => $details) {
                if ($details['p_id'] == $product->id)
                    return true;
            }
            return false;
        }
        return false;

    }

    static function get_product_price($product_id)
    {

        $product = Product::where('id', $product_id)->with('categories')->with('hasAction')->first();
        if (!$product)
            return abort(404);

        $category_action = null;
        if (count($product->categories) > 0) {
            foreach ($product->categories as $category) {
                if (isset($category->category) && $category->category->hasAction)
                    $category_action = $category->category->hasAction;
            }
        }

        $new_price = $product->price;
        $old_price = $product->price;
        $discount = 0;
        $discount_percent = 0;
        if ($product->hasAction) {
            $new_price = $product->hasAction->new_price;
            $discount = $product->price - $product->hasAction->new_price;
            $discount_percent = ($discount * 100) / $old_price;
        } else if ($category_action != null) {
            $new_price = ConfigurationHelper::price_with_discount($product->price, $category_action->discount);
            $discount = $product->price * ($category_action->discount / 100);
            $discount_percent = $category_action->discount;
        }
        $product_has_action = true;
        if ($discount == 0)
            $product_has_action = false;


        $returnData = [
            'newPrice' => (int)$new_price,
            'discount' => (int)$discount,
            'oldPrice' => (int)$old_price,
            'product_has_action' => $product_has_action,
            'discount_percent' => (int)$discount_percent
        ];

        return $returnData;
    }

    static function get_product_colors($product_id)
    {
        $product = Product::whereId($product_id)->where('status', 1)->with('images')->first();

        $product_colors = [];
        if ($product->productKey != null) {
            $product_colors = Product::where('productKey', $product->productKey)->where('status', 1)->with('images')->get();
        }
        return $product_colors;
    }

    static function get_related_products($product_id)
    {
        $product = Product::whereId($product_id)->where('status', 1)->with('images')->first();

        if (!$product)
            return abort(404);

        $cIds = $product->categories->pluck('category_id')->toArray();
        foreach ($cIds as $c) {
            $category = Category::with('related')->where('id', $c)->with('parent')->where('status', 1)->first();
            if ($category->parent != null && $category->parent->parent != null && $category->parent->parent->parent != null && in_array($category->parent->parent->parent->id, $cIds)) //fourth level
            {
                unset($cIds[array_search($category->parent->parent->parent->id, $cIds)]);
            }
            if ($category->parent != null && $category->parent->parent != null && in_array($category->parent->parent->id, $cIds)) {
                unset($cIds[array_search($category->parent->parent->id, $cIds)]);
            }
            if ($category->parent != null && in_array($category->parent->id, $cIds)) {
                unset($cIds[array_search($category->parent->id, $cIds)]);
            }
        }

        $relatedProducts = [];

        foreach ($cIds as $c) {
            $category = Category::with('related')->where('id', $c)->where('status', 1)->first();
            if ($category != null) {
                foreach ($category->related as $p) {
                    if ($p->status == 1 && !in_array($p, $relatedProducts) && $p->id != $product->id) {
                        $relatedProducts[] = $p;
                    }
                }
            }
        }

        return $relatedProducts;
    }

    static function show_review_form($product_id)
    {

        $productsIDs = [];
        if (auth()->check()) {
            $orders = Order::where('client_id', auth()->user()->id)->with('items')->get();
            if (isset($orders) && count($orders) != 0) {
                foreach ($orders as $order) {
                    if (isset($order->items) && count($order->items) > 0) {
                        foreach ($order->items as $item)
                            $productsIDs = $item->pluck('product_id');
                    }
                }
            }
            if (count($productsIDs) > 0) {
                foreach ($productsIDs as $pID) {
                    if ($product_id == $pID)
                        return true;
                }
            }
        }
        return false;
    }

    static function get_product_average_stars($reviews)
    {
        $sum = 0;
        foreach ($reviews as $review) {
            $sum += $review->stars;
        }
        return $sum / count($reviews);
    }

    static function get_cart_product($cart_item)
    {
        return Product::with('sizes')->findOrFail($cart_item['p_id']);
    }

    static function get_cart_totals($cart_items)
    {
        $total_discount = 0;
        $subtotal = 0;
        $old_subtotal = 0;
        if (isset($cart_items))
        {
            foreach ($cart_items as $item) {
                $product = ProductsHelper::get_cart_product($item);
                $old_subtotal += ProductsHelper::get_product_price($product->id)['oldPrice'] * $item['quantity'];
                $subtotal += ProductsHelper::get_product_price($product->id)['newPrice'] * $item['quantity'];
                $total_discount += ProductsHelper::get_product_price($product->id)['discount'] * $item['quantity'];
            }
        }

        $returnData = [
            'discount' => $total_discount,
            'subtotal' => $subtotal,
            'old_subtotal' => $old_subtotal,
        ];

        return $returnData;
    }


}

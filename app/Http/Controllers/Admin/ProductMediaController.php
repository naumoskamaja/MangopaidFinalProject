<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\ImageHelper;
use App\Models\Media;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductMediaController extends Controller
{
    public function upload($product_id)
    {
        $product = Product::findOrFail($product_id);
        try {
            if (request()->file("file")) {
                DB::beginTransaction();
                $media = new Media();
                $url = ImageHelper::uploadFile(request()->file('file'), base_path('public/assets/uploaded_gallery/products/' . $product_id));
                $media->image = 'assets/uploaded_gallery/products/' . $product_id . '/' . $url[0];
                $media->product_id = $product_id;
                $media->meta_tag = $url[0];
                $media->thumbnail = 'assets/uploaded_gallery/products/' . $product_id . '/' . $url[1];
                $media->base_img = 0;
                $media->save();
                DB::commit();
                return $this->returnData(200, 'Media uploaded successfully!', $media);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->returnData(500, 'Media failed to upload!', []);
        }
    }

    public function delete($product_id, $img_id)
    {
        $media = Media::where('id', $img_id)->where('product_id', $product_id)->first();
        if ($media == null)
            return $this->returnData(404, 'Image not found.', null);

        $file_thumb = $media->thumbnail;
        $filename = explode('/assets/uploaded_gallery/products/' . $media->product_id . '/', $media->image);
        if (isset($filename[1])) {
            $filename = $filename[1];
            if (file_exists(base_path('public/assets/uploaded_gallery/products/' . $media->product_id . '/' . $file_thumb)))
                unlink(base_path('public/assets/uploaded_gallery/products/' . $media->product_id . '/' . $file_thumb));
            if (file_exists(base_path('public/assets/uploaded_gallery/products/' . $media->product_id . '/' . $filename)))
                unlink(base_path('public/assets/uploaded_gallery/products/' . $media->product_id . '/' . $filename));
        }
        $media->delete();

        $medias = Media::where('product_id', $product_id)->get();
        return $this->returnData(200, 'Media deleted successfully!', $medias);
    }

}

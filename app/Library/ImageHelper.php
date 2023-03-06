<?php

namespace App\Library;
use Illuminate\Support\Facades\Storage;
use Image;

class ImageHelper
{
    static function uploadFile($file, $path)
    {
        try {

            if (!file_exists($path)) {
                mkdir($path, 0775, true);
            }
            $ext = $file->getClientOriginalExtension();
            $filename = uniqid() . "." . $ext;
            $upload_success = $file->move($path, $filename);
            $thumbnail = '';
            $video = 'true';
            if ($ext != 'mp3' && $ext != 'mp4') {
//                $thumbnail = ImageHelper::resizeImage($filename, $path, $file);
                $video = false;
            }
            return [$filename, $thumbnail, $video];
        } catch (\Exception $e) {
            return '';
        }
    }

    static function resizeImage($file, $path, $fileToUpload)
    {
        // Resize image
        $image = Image::make($path . '/' . $file);
        $ext = $fileToUpload->getClientOriginalExtension();
        $image->resize(320, null, function ($constraint) {
            $constraint->aspectRatio();
        })->encode($ext);

        $filename = uniqid() . "_thumb." . $fileToUpload->getClientOriginalExtension();
        // Put image to storage
        $image->save($path . '/' . $filename);
        return $filename;
    }

}

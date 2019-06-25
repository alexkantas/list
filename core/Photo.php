<?php

namespace Notifier\Core;

use Intervention\Image\ImageManagerStatic as Image;

class Photo {
    private static $image;

    public static function upload($file){
        try{
            $image = Image::make($file);
        } catch(\Intervention\Image\Exception\NotReadableException $e){
            echo "File is not valid!";
            die();
        }
        $image->resize(150, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->save("uploads/profile.jpg");
    }
}
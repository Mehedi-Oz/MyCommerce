<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtherImage extends Model
{
    private static $otherImage, $otherImages, $image, $imageNewName, $directory, $imgUrl;

    public static function newOtherImage($images, $id)
    {
        foreach ($images as $image) {
            self::$otherImage = new OtherImage();
            self::$otherImage->product_id = $id;
            self::$otherImage->image = self::saveImage($image);
            self::$otherImage->save();
        }
    }

    private static function saveImage($image)
    {
        self::$imageNewName = 'OtherImage-' . rand() . '.' . $image->getClientOriginalExtension();
        self::$directory = 'admin-asset/upload-images/product-other-images/';
        $image->move(self::$directory, self::$imageNewName);
        return $imgUrl = self::$directory . self::$imageNewName;
    }

    public static function updateOtherImages($images, $id)
    {
        self::$otherImages = OtherImage::where('product_id', $id)->get();
        foreach (self::$otherImages as $image) {
            if (file_exists($image->image)) {
                unlink($image->image);
            }
            $image->delete();
        }
        self::newOtherImage($images, $id);
    }

//    public static function deleteOtherImage($images, $id)
//    {
//
//    }
}

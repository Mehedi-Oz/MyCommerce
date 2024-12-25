<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public static $product, $image, $imageNewName, $directory, $imgUrl;

    protected $fillable = ['name', 'description', 'image', 'status'];

    public static function store($request)
    {
        self::$product = new Product();
        self::$product->name = $request->name;
        self::$product->description = $request->description;
        self::$product->status = $request->status;
        self::$product->image = self::saveImage($request);
        self::$product->save();
    }

    private static function saveImage($request)
    {
        self::$image = $request->file('image');
        self::$imageNewName = 'Product-' . rand() . '.' . self::$image->getClientOriginalName();
        self::$directory = 'admin-asset/upload-images/product/';
        self::$image->move(self::$directory, self::$imageNewName);
        return $imgUrl = self::$directory . self::$imageNewName;
    }

    public static function statusProduct($id)
    {
        self::$product = Product::find($id);

        if (self::$product->status == 1) {
            self::$product->status = 2;
        } else {
            self::$product->status = 1;
        }
        self::$product->save();
    }

    public static function updateProduct($request)
    {
        self::$product = Product::find($request->id);

        self::$product->name = $request->name;
        self::$product->description = $request->description;

        if ($request->file('image')) {
            if (self::$product->image && file_exists(self::$product->image)) {
                unlink(self::$product->image);
            }
            self::$product->image = self::saveImage($request);
        }
        self::$product->status = $request->status;
        self::$product->save();
    }

    public static function deleteProduct($request)
    {
        self::$product = Product::find($request->id);

        if (self::$product) {
            if (self::$product->image && file_exists(self::$product->image)) {
                unlink(self::$product->image);
            }
        }
        self::$product->delete();
    }
}

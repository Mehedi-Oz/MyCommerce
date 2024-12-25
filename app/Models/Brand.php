<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public static $brand, $image, $imageNewName, $directory, $imgUrl;

    protected $fillable = ['name', 'description', 'image', 'status'];

    public static function store($request)
    {
        self::$brand = new Brand();
        self::$brand->name = $request->name;
        self::$brand->description = $request->description;
        self::$brand->status = $request->status;
        self::$brand->image = self::saveImage($request);
        self::$brand->save();
    }

    private static function saveImage($request)
    {
        self::$image = $request->file('image');
        self::$imageNewName = 'Brand-' . rand() . '.' . self::$image->getClientOriginalName();
        self::$directory = 'admin-asset/upload-images/brand/';
        self::$image->move(self::$directory, self::$imageNewName);
        return $imgUrl = self::$directory . self::$imageNewName;
    }

    public static function statusBrand($id)
    {
        self::$brand = Brand::find($id);

        if (self::$brand->status == 1) {
            self::$brand->status = 2;
        } else {
            self::$brand->status = 1;
        }
        self::$brand->save();
    }

    public static function updateBrand($request)
    {
        self::$brand = Brand::find($request->id);

        self::$brand->name = $request->name;
        self::$brand->description = $request->description;

        if ($request->file('image')) {
            if (self::$brand->image && file_exists(self::$brand->image)) {
                unlink(self::$brand->image);
            }
            self::$brand->image = self::saveImage($request);
        }
        self::$brand->status = $request->status;
        self::$brand->save();
    }

    public static function deleteBrand($request)
    {
        self::$brand = Brand::find($request->id);

        if (self::$brand) {
            if (self::$brand->image && file_exists(self::$brand->image)) {
                unlink(self::$brand->image);
            }
        }
        self::$brand->delete();
    }
}

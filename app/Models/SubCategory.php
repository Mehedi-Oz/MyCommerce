<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public static $subcategory, $image, $imageNewName, $directory, $imgUrl;

    public static function store($request)
    {
        self::$subcategory = new SubCategory();
        self::$subcategory->caregory_id = $request->caregory_id;
        self::$subcategory->name = $request->name;
        self::$subcategory->description = $request->description;
        self::$subcategory->status = $request->status;
        self::$subcategory->image = self::saveImage($request);
        self::$subcategory->save();
    }

    private static function saveImage($request)
    {
        self::$image = $request->file('image');
        self::$imageNewName = 'SubCategory-' . rand() . '.' . self::$image->getClientOriginalName();
        self::$directory = 'admin-asset/upload-images/sub-category/';
        self::$image->move(self::$directory, self::$imageNewName);
        return $imgUrl = self::$directory . self::$imageNewName;
    }

    public static function statusSubCategory($id)
    {
        self::$subcategory = SubCategory::find($id);

        if (self::$subcategory->status == 1) {
            self::$subcategory->status = 2;
        } else {
            self::$subcategory->status = 1;
        }
        self::$subcategory->save();
    }

    public static function updateSubCategory($request)
    {
        self::$subcategory = SubCategory::find($request->id);

        self::$subcategory->caregory_id = $request->caregory_id;
        self::$subcategory->name = $request->name;
        self::$subcategory->description = $request->description;

        if ($request->file('image')) {
            if (self::$subcategory->image && file_exists(self::$subcategory->image)) {
                unlink(self::$subcategory->image);
            }
            self::$subcategory->image = self::saveImage($request);
        }
        self::$subcategory->status = $request->status;
        self::$subcategory->save();
    }

    public static function deleteSubCategory($request)
    {
        self::$subcategory = SubCategory::find($request->id);

        if (self::$subcategory) {
            if (self::$subcategory->image && file_exists(self::$subcategory->image)) {
                unlink(self::$subcategory->image);
            }
        }
        self::$subcategory->delete();
    }
}

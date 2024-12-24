<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public static $category, $image, $imageNewName, $directory, $imgUrl;

    public static function store($request)
    {
        self::$category = new Category();
        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->status = $request->status;
        self::$category->image = self::saveImage($request);
        self::$category->save();
    }

    private static function saveImage($request)
    {
        self::$image = $request->file('image');
        self::$imageNewName = 'Category-' . rand() . '.' . self::$image->getClientOriginalName();
        self::$directory = 'admin-asset/upload-images/category/';
        self::$image->move(self::$directory, self::$imageNewName);
        return $imgUrl = self::$directory . self::$imageNewName;
    }

    public static function statusCategory($id)
    {
        self::$category = Category::find($id);

        if (self::$category->status == 1) {
            self::$category->status = 2;
        } else {
            self::$category->status = 1;
        }
        self::$category->save();
    }

    public static function updateCategory($request)
    {
        self::$category = Category::find($request->id);

        self::$category->name = $request->name;
        self::$category->description = $request->description;

        if ($request->file('image')) {
            if (self::$category->image && file_exists(self::$category->image)) {
                unlink(self::$category->image);
            }
            self::$category->image = self::saveImage($request);
        }
        self::$category->status = $request->status;
        self::$category->save();
    }

    public static function deleteCategory($request)
    {
        self::$category = Category::find($request->id);

        if (self::$category) {
            if (self::$category->image && file_exists(self::$category->image)) {
                unlink(self::$category->image);
            }
        }
        self::$category->delete();
    }
}

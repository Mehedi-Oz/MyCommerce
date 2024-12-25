<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public static $unit;

    protected $fillable = ['name', 'description', 'code', 'status'];

    public static function store($request)
    {
        self::$unit = new Unit();
        self::$unit->name = $request->name;
        self::$unit->code = $request->code;
        self::$unit->description = $request->description;
        self::$unit->status = $request->status;
        self::$unit->save();
    }

    public static function statusUnit($id)
    {
        self::$unit = Unit::find($id);

        if (self::$unit->status == 1) {
            self::$unit->status = 2;
        } else {
            self::$unit->status = 1;
        }
        self::$unit->save();
    }

    public static function updateUnit($request)
    {
        self::$unit = Unit::find($request->id);

        self::$unit->name = $request->name;
        self::$unit->code = $request->code;
        self::$unit->description = $request->description;
        self::$unit->status = $request->status;
        self::$unit->save();
    }

    public static function deleteUnit($request)
    {
        self::$unit = Unit::find($request->id);
        self::$unit->delete();
    }
}

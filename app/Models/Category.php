<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cache;
use DB;

class Category extends Model
{
	use SoftDeletes;

    protected $table = 'categories';
    protected $primaryKey = 'cat_id';
    public $timestamps = true;
    protected $dates = ['deleted_at'];
    private static $cacheKey = 'categories';

    public function products()
    {
    	return $this->hasMany(Product::class, 'cat_id');
    }

    public function getParentCate()
    {
        if (Cache::has(self::$cacheKey))
        {
            $result = Cache::get(self::$cacheKey);
        }else {
            $result = DB::table($this->table)
                        ->select('cat_id', 'cat_name', 'cat_slug')
                        ->whereNull('parent_cat_id')
                        ->orWhere('parent_cat_id', 0)
                        ->get()
                        ->toArray();

            Cache::forever(self::$cacheKey, $result);
        }

        return $result;
    }
} // End class

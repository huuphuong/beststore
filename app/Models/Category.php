<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
	use SoftDeletes;
	
    protected $table = 'categories';
    protected $primaryKey = 'cat_id';
    public $timestamps = true;
    protected $dates = ['deleted_at'];

    public function products() 
    {
    	return $this->hasMany(Product::class, 'cat_id');
    }
} // End class

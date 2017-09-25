<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'cat_id';
    public $timestamps = true;

    public function products() 
    {
    	return $this->hasMany(Product::class, 'cat_id');
    }
} // End class

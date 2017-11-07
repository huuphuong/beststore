<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryImage extends Model
{
    protected $table = 'categories_image';
    protected $fillable = ['cat_id', 'storage'];
    public $timestamps = true;
}

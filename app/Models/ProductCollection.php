<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCollection extends Model
{
    protected $table = 'product_collection';
    protected $primaryKey = 'pc_id';
    public $timestamps = false;
}

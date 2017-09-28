<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use SoftDeletes;

	protected $table		= 'products';
	protected $primaryKey	= 'product_id';
	protected $guarded		= [];
	public $timestamps		= true;
	protected $dates = ['deleted_at'];

	public function category()
	{
		return $this->belongsTo(Category::class, 'cat_id');
	}


	public function vendor()
	{
		return $this->belongsTo(Vendor::class, 'vendor_id');
	}


	public function getAll()
	{
		$result = \DB::table('products')
					 ->join('categories', 'categories.cat_id', '=', 'products.cat_id')
					 ->join('vendors', 'vendors.vendor_id', '=', 'products.vendor_id')
					 ->select(
					 	'products.product_id',
					 	'products.product_name',
					 	'products.product_price',
					 	'products.product_price',
					 	'products.product_pricesale',
					 	'products.product_image',
					 	'products.is_new',
					 	'products.is_sale',
					 	'products.is_hot',
					 	'categories.cat_name',
					 	'vendors.vendor_name'
					 )
					 ->whereNull('products.deleted_at')
					 ->get();
		return $result;
	}
} // End class

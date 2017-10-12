<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class ProductCollection extends Model
{
	protected $table				= 'product_collection';
	protected $primaryKey			= 'pc_id';
	public $timestamps				= false;
	public static $PRODUCT_NEW		= 1;
	public static $SPECIAL_OFFER	= 2;
	public static $COLLECTION		= 3;

    public static function getProductCollection($pg_id) 
	{
		$result = DB::table('products')
				    ->join('product_collection', 'products.product_id', '=', 'product_collection.product_id')
				    ->select(
				    	'products.product_id',
				    	'products.product_name',
				    	'products.product_slug',
				    	'products.product_price',
				    	'products.product_pricesale',
				    	'products.product_image',
				    	'products.is_new',
				    	'products.is_sale',
				    	'products.is_hot'
				    )
				    ->where('products.display', 1)
				    ->whereNull('products.deleted_at')
				    ->where('product_collection.pg_id', $pg_id)
				    ->orderBy('product_collection.position', 'ASC')
				    ->get();
		// dd($result[0]);
		return $result;
	}
}

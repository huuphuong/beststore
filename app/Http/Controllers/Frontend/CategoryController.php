<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class CategoryController extends Controller
{
	private static $limit = 15;

    public function categories ($category) 
    {
    	$categories = Product::join('categories', 'categories.cat_id', '=', 'products.cat_id')
					    	 ->select(
					    	 	'product_id', 
					    		'product_name', 
					    		'product_price', 
					    		'product_pricesale',
					    		'product_slug',
					    		'product_image',
					    		'is_sale',
					    		'is_new',
					    		'is_hot',
					    		'categories.cat_name'
					    	)
					    	 ->where('cat_slug', $category)
					    	 ->where('products.display', 1)
					    	 ->whereNull('products.deleted_at')
					    	 ->paginate(self::$limit);
    	
    	return view('frontend.category', compact('categories'));
    }
} // End class

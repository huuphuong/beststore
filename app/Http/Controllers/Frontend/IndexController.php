<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductGroup;
use App\Models\ProductCollection;

class IndexController extends Controller
{
    public function index(Request $request) 
    {
    	$product = new ProductCollection();
    	$productGroup = ProductGroup::all();

    	foreach ($productGroup AS $pg)
    	{
    		$data[$pg->pg_id] = $product->getProductCollection($pg->pg_id);
    	}

    	return view('frontend.index', compact('productGroup', 'data'));
    }
} // End class

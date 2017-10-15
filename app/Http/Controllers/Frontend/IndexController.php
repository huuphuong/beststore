<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\AppHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductGroup;
use App\Models\ProductCollection;
use App\Models\Subscribe;
use Illuminate\Support\Facades\Redis;

class IndexController extends Controller
{
    public function index(Request $request)
    {
    	$product = new ProductCollection();
    	$productGroup = ProductGroup::all();

    	if (Redis::exists('products'))
        {
            $data = json_decode(Redis::get('products'));
        }
        else {
            foreach ($productGroup AS $pg)
            {
                $data[$pg->pg_id] = $product->getProductCollection($pg->pg_id);
            }

            Redis::set('products', json_encode($data));
        }

        $data = AppHelper::convertArray($data);
    	return view('frontend.index', compact('productGroup', 'data'));
    }


    /**
     * Subscribe email để nhận thông tin shop
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function subscribe (Request $request)
    {
        $email = trim($request->email);
        $insert = Subscribe::subscribeShop($email);
        return response()->json('success', 200);
    }
} // End class

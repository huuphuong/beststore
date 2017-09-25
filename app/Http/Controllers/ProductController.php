<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use App\Api;
use App\Helpers\AppHelper;

class ProductController extends Controller
{
    private static $_productViewStart = 1;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $post_data = $request->all();
            $product_request = $post_data['product'];

            $product = new Product();
            $product->product_name      = $product_request['product_name'];
            $product->product_slug      = str_slug($product_request['product_name']);
            $product->product_price     = $product_request['product_price'];
            $product->product_pricesale = $product_request['product_pricesale'];
            $product->product_intro     = $product_request['product_intro'];
            $product->product_content   = $product_request['product_content'];
            $product->product_image     = $product_request['product_image'];
            $product->product_view      = self::$_productViewStart;
            $product->product_qty       = $product_request['product_qty'];
            $product->size              = json_encode($product_request['size']);
            $product->color             = AppHelper::setColor($product_request['color']);
            $product->cat_id            = $product_request['cat_id'];
            $product->is_new            = $product_request['is_new'];
            $product->is_hot            = $product_request['is_hot'];
            $product->is_sale           = $product_request['is_sale'];
            $product->vendor_id         = $product_request['vendor_id'];
            $product->save();

            // Product detail image
            $detail_request = $post_data['product_detail_image'];
            for ($i=0, $count = count($detail_request); $i < $count; $i++)
            {
                try {
                    $product_image = new ProductImage();
                    $product_image->product_id = $product->product_id;
                    $product_image->storage = $detail_request[$i]['dataURL'];
                    $product_image->save();
                }catch (\Exception $e) {
                    $res = [
                        'status' => Api::$_SERVERERROR,
                        'message' => 'Product has been created. But product\'s image can not crated. Please try again later!'
                    ];
                }
            }

            $res = [
                'status' => Api::$_OK,
                'data' => $product
            ];

        }catch (\Exception $e) {
            $res = [
                'status' => Api::$_SERVERERROR,
                'message' => 'Can not create product. Please contact administator to support this problem!'
            ];
        }

        return response()->json($res, Api::$_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function upload(Request $request) 
    {
        dd($request->all());
    }
} // End class

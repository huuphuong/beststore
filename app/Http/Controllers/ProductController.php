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
    public function index(Request $request)
    {
        try {
            $product = new Product();
            $query = $request->all();
            $data = $product->getAll($query);
            $res = Api::resourceApi(Api::$_OK, $data);
        }catch (\Exception $e) {
            $message = 'Can\'t get product list.';
            $res = Api::resourceApi(Api::$_SERVERERROR, $message);
        }

        return response()->json($res, Api::$_OK);
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
            $product->size              = !empty ($product_request['size']) ? implode(', ', $product_request['size']) : null ;
            $product->color             = !empty ($product_request['color']) ? implode(',', $product_request['color']) : null;
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
                    $message = 'Product has been created. But product\'s image can not crated. Please try again later!';
                    $res = Api::resourceApi($e->getCode(), $message);
                }
            }

            $res = Api::resourceApi(Api::$_OK, $product);

        }catch (\Exception $e) {
            $message = 'Can not create product. Please contact administator to support this problem!';
            $res = Api::resourceApi($e->getCode(), $message);
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
        try {
            $product = Product::findOrFail($id);
            $product_response             = $product->toArray();
            $product_response['cat_name'] = $product->category->cat_name;
            $product_response['color']    = explode(',', $product->color);
            $product_response['vendor_name'] = $product->vendor->vendor_name;
            $res = Api::resourceApi(Api::$_OK, $product_response);
        }catch (\Exception $e) {

            dd($e->getMessage());
            $message = 'No result';
            $res = Api::resourceApi($e->getCode(), $message);
        }

        return response()->json($res, Api::$_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $product = Product::find($id);
            if ($product) {

                $res['product'] = Api::resourceApi(Api::$_OK, $product);
                $res['product']['data']['size'] = explode(', ', $product->size);
                $res['product']['data']['color'] = explode(',', $product->color);
               
                $res['images'] = ProductImage::where('product_id', $id)
                                             ->select('image_id', 'storage')
                                             ->get()
                                             ->toArray();
            }
        } catch (\Exception $e) {
            $message = "Can not get product";
            $res = Api::resourceApi(Api::$_SERVERERROR, $message);
        }

        return response()->json($res, Api::$_OK);
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
        try {
            $post_data = $request->all();
            $product_request = $post_data['product'];
            $product = Product::findOrFail($id);
            $product->product_name      = $product_request['product_name'];
            $product->product_slug      = str_slug($product_request['product_name']);
            $product->product_price     = $product_request['product_price'];
            $product->product_pricesale = $product_request['product_pricesale'];
            $product->product_intro     = $product_request['product_intro'];
            $product->product_content   = $product_request['product_content'];
            $product->product_image     = $product_request['product_image'];
            $product->product_qty       = $product_request['product_qty'];
            $product->size              = !empty ($product_request['size']) ? implode(', ', $product_request['size']) : null ;
            $product->color             = !empty ($product_request['color']) ? implode(',', $product_request['color']) : null;
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
                    $message = 'Product has been updated. But product\'s image can not crated. Please try again later!';
                    $res = Api::resourceApi($e->getCode(), $message);
                }
            }

            $res = Api::resourceApi(Api::$_OK, $product);

        }catch (\Exception $e) {
            $message = 'Can not update product. Please contact administator to support this problem!';
            $res = Api::resourceApi($e->getCode(), $message);
        }

        return response()->json($res, Api::$_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            try {
                $row = $product->delete();
                if ($row) {
                    $message = 'Product has been deleted';
                    $res = Api::resourceApi(Api::$_OK, $message);
                }
            } catch (\Exception $e) {
                $message = 'Can\'t delete this product';
                $res = Api::resourceApi($e->getCode(), $message);
            }
        }else {
            $message = 'Can not find this product';
            $res = Api::resourceApi($_NOTFOUND, $message);
        }

        return response()->json($res, Api::$_OK);
    }


    public function upload(Request $request)
    {
        return response()->json(true, Api::$_OK);
    }
} // End class

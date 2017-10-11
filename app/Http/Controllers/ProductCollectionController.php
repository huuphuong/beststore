<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCollection;
use App\Models\Product;
use App\Models\ProductGroup;
use App\Api;

class ProductCollectionController extends Controller
{
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
    public function productOfCollection(Request $request)
    {
        try {
            $products = Product::join('product_collection', 'product_collection.product_id', '=', 'products.product_id')
                               ->select('products.product_id', 'products.product_name', 'products.product_image', 'product_collection.position')
                               ->where('product_collection.pg_id', $request->pg_id)
                               ->orderBy('product_collection.position', 'ASC')
                               ->orderBy('product_collection.pc_id', 'DESC')
                               ->get()
                               ->toArray();

            if (!empty ($products)) {
                $res = Api::resourceApi(Api::$_OK, $products);
            } else {
                $res = Api::resourceApi(Api::$_OK, 'No data');
            }                  
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $res = Api::resourceApi($e->getCode(), $message);
        }
        
        return response()->json($res, Api::$_OK);
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
            $product_data = $request->product_id;
            if (empty ($product_data)) 
            {
                $message = 'Please choose product for this collection';
                $res = Api::resourceApi(Api::$_NOCONTENT, $message);
            }
            else {
                $insertArray = array();

                // Kiểm tra xem sản phẩm có tồn tại trong collection không?
                   foreach ($product_data AS $p) {
                    $count = ProductCollection::where('product_id', $p)
                    ->where('pg_id', $request->pg_id)
                    ->count();
                    if ($count == 0) {
                        $insertArray[] = array(
                            'product_id' => $p,
                            'pg_id' => $request->pg_id
                        );
                    }                          
                }


                $insert = ProductCollection::insert($insertArray);

                $message = 'Add product into collection has been success';
                $res = Api::resourceApi(Api::$_OK, $message);
            }
           
        } catch (\Exception $e) {
            dd($e);
            $message = 'Can not add product into collection. Please try again later';
            $res = Api::resourceApi(Api::$_SERVERERROR, $message);
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
     * Xóa sản phẩm trong collection
     *
     * @param  int  $product_id: Mã sản phẩm
     * @return \Illuminate\Http\Response
     */
    public function removeProduct($product_id)
    {
        try {
            $delete = ProductCollection::where('product_id', $product_id)->delete();
            $message = 'Delete product has been success';
            $res = Api::resourceApi(Api::$_CREATED, $message);
        } catch (\Exception $e) {
            $res = Api::resourceApi($e->getCode(), $e->getMessage());
        }

        return response()->json($res, Api::$_OK);
    }

    
    /**
     * Cập nhật vị trí hiển thị của product trong collection
     * @param  Request
     * @return Response
     */
    public function updatePosition(Request $request)
    {
        $post_data = $request->all();
        if (! empty ($post_data)) {
            $pg_id = $post_data[0]['pg_id'];
            try {
                // Xóa hết sản phẩm trong collection rồi chèn lại
                $row = ProductCollection::where('pg_id', '=', $pg_id)->delete();
                $insert = ProductCollection::insert($post_data);
                $message = 'Update position success';
                $res = Api::resourceApi(Api::$_CREATED, $message);
            } catch (\Exception $e) {
                $res = Api::resourceApi($e->getCode(), $e->getMessage());
            }

        }else {
            // Gửi lên empty => đã xóa hết item, messgae yêu cầu add sản phẩm vào group
            $messgae = 'Please add product into this group';
            $res = Api::resourceApi(Api::$_OK, $message);
        }

        return response()->json($res, Api::$_OK);
    }
} // End class

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCollection;
use App\Models\Product;
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
                               ->select('products.product_id', 'products.product_name', 'products.product_image')
                               ->where('product_collection.pg_id', $request->pg_id)
                               ->orderBy('product_collection.position', 'ASC')
                               ->orderBy('product_collection.pc_id', 'DESC')
                               ->get();
                               
            $res = Api::resourceApi(Api::$_OK, $products);
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

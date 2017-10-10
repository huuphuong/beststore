<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCollection;
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
            $product_data = $request->product_id;
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

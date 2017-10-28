<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductGroup;
use App\Models\ProductCollection;
use App\Api;

class ProductGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_group = new ProductGroup();

        $res = array(
            'status' => Api::$_OK,
            'data' => $product_group->getGroupWithCollection()
        );

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
            $productGroup = new ProductGroup();
            $productGroup->pg_name = $request->pg_name;
            $productGroup->pg_desc = $request->pg_desc;
            $productGroup->pg_discount = $request->pg_discount;
            $productGroup->pg_shopname = $request->pg_shopname;
            $productGroup->display = $request->display;

            $imageName = uniqid() . '.jpg';
            $path = public_path() . '/thumbnail/' . $imageName;
            $saveFile = file_put_contents($path, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->pg_background)));

            if ($saveFile) {
                $productGroup->pg_background = asset('thumbnail/' . $imageName);
            }
            $productGroup->save();

            $res = Api::resourceApi(Api::$_OK, 'Create collection has been success');
        } catch (\Exception $e) {
            $res = Api::resourceApi($e->getCode(), $e->getMessage());
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
            $productGroup = ProductGroup::findOrFail($id);
            $res = Api::resourceApi(Api::$_OK, $productGroup);
        } catch (\Exception $e) {
            $message = 'No data';
            $res = Api::resourceApi(Api::$_OK, $message);
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

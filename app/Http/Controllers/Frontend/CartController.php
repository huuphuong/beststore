<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\AppHelper;
use App\Api;
use Cart;

class CartController extends Controller
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
    public function addToCart(Request $request)
    {
        try {
            if ( !empty(AppHelper::number($request->price_sale)) ) {
                $finalPrice = $request->price_sale;
            }else {
                $finalPrice = $request->price;
            }

            $cart = Cart::add(
                [
                    'id'    => $request->id,
                    'name'  => $request->name,
                    'qty'   => $request->qty,
                    'price' => AppHelper::number($finalPrice)
                ]
            );

            $cart_data = array(
                'cart' => $cart,
                'priceSum' => substr(Cart::subtotal(), 0, strrpos(Cart::subtotal(), '.')),
                'productCount' => Cart::count()
            );
            $res = Api::resourceApi(Api::$_OK, $cart_data);
        } catch (Exception $e) {
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
    public function destroyCart()
    {
        try {
            Cart::destroy();
            $res = Api::resourceApi(Api::$_OK, 'Hủy giỏ hàng thành công');
        } catch (\Exception $e) {
            $res = Api::resourceApi($e->getCode(), $e->getMessage());
        }

        return response()->json($res, Api::$_OK);
    }
}

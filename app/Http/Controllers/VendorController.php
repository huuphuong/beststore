<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Helpers\AppHelper;
use App\Api;

class VendorController extends Controller
{
	private static $path = 'asset_vendors';

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		try {
			$vendor = Vendor::all();
			$res = Api::resourceApi(Api::$_OK, $vendor);
		} catch (\Exception $e) {
			$message = 'Can not get vendor';
			$res = Api::resourceApi($e->getCode, $message);
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
			$vendor = new Vendor();
			$vendor->vendor_name		= $request->vendor_name;
			$vendor->vendor_shortname	= $request->vendor_shortname;
			$vendor->vendor_email		= $request->vendor_email;
			$vendor->vendor_skype		= $request->vendor_skype;
			$vendor->vendor_phone		= $request->vendor_phone;
			$vendor->vendor_address		= $request->vendor_address;
			$image						= AppHelper::base64ImgToFile(self::$path, $request->vendor_images);
			$vendor->vendor_images		= $image;
			$vendor->save();

			$res = Api::resourceApi(Api::$_CREATED, 'Create vendor has been success');
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
		try {
			$vendor = Vendor::findOrFail($id)->delete();
			$res = Api::resourceApi(Api::$_CREATED, 'Delete vendor has been success');	
		} catch (\Exception $e) {
			$res = Api::resourceApi($e->getCode(), $e->getMessage());
		}
		
		return response()->json($res, Api::$_OK);
	}

}

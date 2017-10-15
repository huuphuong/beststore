<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Api;
use Cache;

class SettingController extends Controller
{

	public function index(Request $request)
	{
		$res = Api::resourceApi(Api::$_OK, Setting::all());
		return response()->json($res, Api::$_OK);
	}


	public function store(Request $request)
	{
		try {
    		// Xóa hết setting rồi chèn lại data vào DB
			$truncate = Setting::truncate();

			$setting = new Setting();
			$setting->logo       = !empty($request->logo) ? $request->logo : Cache::get('settings')->logo;
			$setting->slogan     = $request->slogan;
			$setting->newletter  = $request->newletter;
			$setting->categories = $request->categories;

			foreach ($request->page_name AS $key => $page)
			{
				$page_slug = $request->page_slug;
				$categories_item[$page_slug[$key]] = $page;
			}

			$setting->categories_item = json_encode($categories_item);
			$setting->shop_info       = $request->shop_info;
			$setting->address         = $request->address;
			$setting->email           = $request->email;
			$setting->phone           = $request->phone;
			$setting->skype           = $request->skype;
			$setting->copyright       = $request->copyright;
			$setting->save();

			if (Cache::has('settings')) {
				Cache::forget('settings');
			}

			Cache::forever('settings', $setting);

			$message = 'Update settings has been success';
			$res = Api::resourceApi(Api::$_CREATED, $message);
		} catch (\Exception $e) {
			$res = Api::resourceApi($e->getCode(), $e->getMessage());
		}

		return response()->json($res, Api::$_OK);
	}
}

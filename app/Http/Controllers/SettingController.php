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
			$setting->header_icon_info_1 = $request->header_icon_info_1;
			$setting->header_icon_info_2 = $request->header_icon_info_2;
			$setting->header_icon_info_3 = $request->header_icon_info_3;
			$setting->header_text_info_1 = $request->header_text_info_1;
			$setting->header_text_info_2 = $request->header_text_info_2;
			$setting->header_text_info_3 = $request->header_text_info_3;

			foreach ($request->social_name AS $key => $social)
			{
				$icons  = $request->social_icon;
				$urls   = $request->social_url;
				$orders = $request->social_order;

				$social_item[] = array(
					'social_name'  => $social,
					'social_icon'  => $icons[$key],
					'social_url'   => $urls[$key],
					'social_order' => $orders[$key]
				);
			}

			$setting->social_item      = json_encode($social_item);
			$setting->arr_title        = $request->arr_title;
			$setting->arr_desc         = $request->arr_desc;
			$setting->arr_collection_1 = $request->arr_collection_1;
			$setting->arr_collection_2 = $request->arr_collection_2;
			$setting->vendor_1         = $request->vendor_1;
			$setting->text_1           = $request->text_1;
			$setting->vendor_2         = $request->vendor_2;
			$setting->text_2           = $request->text_2;
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

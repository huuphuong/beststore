<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\AppHelper;
use Cache, DB;

class Setting extends Model
{
    protected $table = 'settings';
    public $timestamps = false;


    public function getSetting()
    {
    	if (Cache::has('settings')) {
    		$result =  Cache::get('settings');
    	} else {
    		$result = DB::table('settings')
    					->select('*')
    					->first();
    		Cache::forever('settings', $result);
    	}

    	return AppHelper::convertArray($result);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Cache;

class Slideshow extends Model
{
    protected $table = 'slideshows';
    public $timestamps = true;

    public function getSlideBanner() {
    	if (Cache::has('banners'))
    	{
    		$result = json_decode(Cache::get('banners'));
    	}
    	else {
    		$result = DB::table('slideshows')
    				->where('display', 1)
    				->orderBy('position', 'ASC')
    				->get()
    				->toArray();

    		Cache::forever('banners', json_encode($result));
    	}
    	
    	return $result;
    }
}

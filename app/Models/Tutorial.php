<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Cache;

class Tutorial extends Model
{
	protected $table			= 'tutorials';
	public $timestamps			= true;
	private static $cacheKey	= 'tutorials';

	public function getTutorial() 
	{
		if (Cache::has(self::$cacheKey)) {
			$result = json_decode(Cache::get(self::$cacheKey));
		}
		else  {
			$result = DB::table('tutorials')
					->where('display', 1)
					->first();

			Cache::forever(self::$cacheKey, json_encode($result));
		}
		
		return $result;
	}
}

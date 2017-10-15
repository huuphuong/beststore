<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Subscribe extends Model
{
    protected $table = 'subscribe';
    public $timestamps = false;

    public static function subscribeShop($email)
    {
    	$isExists = DB::table('subscribe')->where('email', $email)->count();
    	if ($isExists == 0)
    	{
    		$row = DB::table('subscribe')
    				 ->insert(['email' => $email]);
    	}

    	return true;
    }
}

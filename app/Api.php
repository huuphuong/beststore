<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
	public static $_PASS			= 'pass';
	public static $_ERROR			= 'error';
	public static $_SUCCESS			= 'success';
	public static $_OK				= 200;
	public static $_CREATED			= 201;
	public static $_NOCONTENT		= 204;
	public static $_NOTMODIFY		= 304;
	public static $_BADREQUEST		= 400;
	public static $_UNAUTHORIZED	= 401;
	public static $_FORBIDDEN		= 403;
	public static $_NOTFOUND		= 404;
	public static $_CONFLICT		= 409;
	public static $_SERVERERROR		= 500;

	public static function resourceApi($status, $data)
	{
		$type = gettype($data) == 'string' ? 'message' : 'data';
		return [
			'status' => $status,
			"$type" => $data
		];
	}
	
}

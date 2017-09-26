<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
	protected $table		= 'vendors';
	protected $primaryKey	= 'vendor_id';
	public $timestamps		= true;

	public function products() 
	{
		return $this->hasMany(Product::class, 'vendor_id');
	}
}

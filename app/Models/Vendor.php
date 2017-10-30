<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
	use SoftDeletes;
	
	protected $table		= 'vendors';
	protected $primaryKey	= 'vendor_id';
	public $timestamps		= true;

	public function products() 
	{
		return $this->hasMany(Product::class, 'vendor_id');
	}
}

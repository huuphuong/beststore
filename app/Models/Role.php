<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
	use SoftDeletes;

	protected $table    = 'roles';
	protected $fillable = ['role_name', 'role_desc'];
	public $timestampe  = true;

	protected $dates    = ['deleted_at'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use DB;

class Navigation extends Model
{
    protected $table = 'navigations';
    public $timestamps = false;

    public function getNavigation()
    {
    	$result = DB::table($this->table)
    				->orderBy('parent_id', 'ASC')
    				->orderBy('position', 'ASC')
    				->get()
    				->toArray();
    	return $result;
    }


    public function hasChildNavigation($parentId)
    {
    	$result = DB::table($this->table)
    				->where('parent_id', $parentId)
    				->count();
    	return $result;
    }


    public function getChildNav($parentId)
    {
    	$collection      = collect($this->getNavigation());
    	$filtersChildNav = $collection->filter(function ($value) use ($parentId) {
    		return $value->parent_id == $parentId;
    	})->values()->toArray();

    	return $filtersChildNav;
    }
} // End class

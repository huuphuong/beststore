<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class ProductGroup extends Model
{
    protected $table = 'product_group';
    protected $primaryKey = 'pg_id';


    public function getGroupWithCollection() {
    	$result = DB::table('product_group')
    				->leftJoin('product_collection', 'product_collection.pg_id', '=', 'product_group.pg_id')
    				->select(DB::raw('product_group.pg_id, product_group.pg_name, COUNT(pc_id) AS count'))
    				->groupBy('product_group.pg_id')
    				->get();
    	return $result;
    }
}

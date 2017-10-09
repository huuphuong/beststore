<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class IndexController extends Controller
{
    public function index(Request $request) 
    {
    	
    	return view('frontend.index');
    }
} // End class

<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Request $request) 
    {
    	return view('frontend.index');
    }
} // End class

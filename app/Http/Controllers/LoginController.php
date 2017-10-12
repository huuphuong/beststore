<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {
    	return view('login');
    }


    public function postLogin(Request $request) 
    {
    	$email = $request->input('email');
    	$password = $request->input('password');

    	
    	if (Auth::attempt(['email' => $email, 'password' => $password]))
    	{
    		return redirect('/admin');
    	}else {
    		return redirect()->back()->with([
    			'flash_email' => $email,
    			'flash_message' => 'Email và mật khẩu chưa chính xác.'
    		]);
    	}
    }
} // End class

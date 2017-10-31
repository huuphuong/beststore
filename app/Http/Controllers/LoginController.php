<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Api;

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


    public function register(Request $request)
    {
        $count = User::where('email', trim($request->email))->count();
        if ($count > 0)
        {
            $res = Api::resourceApi(Api::$_CONFLICT, 'Email đã được sử dụng. <br>Bạn vui lòng sử dụng một email khác');
        }else {
            try {
                $user = new User();
                $user->name = trim($request->email);
                $user->email = trim($request->email);
                $user->password = bcrypt($request->password);
                $user->save();

                $res = Api::resourceApi(Api::$_CREATED, 'Tạo tài khoản thành công. <br>Mời bạn đăng nhập vào hệ thống');
            } catch (\Exception $e) {
                $res = Api::resourceApi($e->getCode(), $e->getMessage());
            }
        }

        return response()->json($res, Api::$_OK);
    }
} // End class

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Api;
use File;
use App\Helpers\AppHelper;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user     = new User();
        $listUser = $user->getUser($request->all());

        $res = array(
            'status' => Api::$_OK,
            'data'   => $listUser
        );

        return response()->json($res, Api::$_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data       = $request->input('body');
        $emailCheck = $this->checkEmail($data['user']['email']);

        if ($emailCheck == Api::$_PASS) {
            $user = new User();
            $user->name     = $data['user']['name'];
            $user->email    = $data['user']['email'];
            $user->gender   = $data['user']['gender'];
            $user->phone    = $data['user']['phone'];
            $user->role_id  = $data['user']['role_id'];
            $user->password = bcrypt($data['user']['password']);

            if (!empty ($data['avatar'])) {
                $image               = AppHelper::base64ImgToFile('asset_users', $data['avatar']);
                $user->avatar        = $image;
            }

            $user->save();

            $res = [
                'data' => $user,
                'status' => Api::$_CREATED,
                'message' => 'Thêm user thành công'
            ];
            return response($res, Api::$_OK);
        }

        return $emailCheck;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::leftJoin('roles', 'roles.id', '=', 'users.role_id')
                    ->where('users.id', $id)
                    ->whereNull('roles.deleted_at')
                    ->first();
        if ($user) {
            $res = array(
                'status' => Api::$_OK,
                'data' => $user
            );
        }
        else {
            $res = array(
                'status' => Api::$_NOCONTENT,
                'message' => 'Không có dữ liệu.'
            );
        }

        return response()->json($res, Api::$_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if ($user) {
            $res = array(
                'status' => Api::$_OK,
                'data' => $user
            );
        }else {
            $res = array(
                'status' => Api::$_NOCONTENT,
                'message' => 'Không có dữ liệu'
            );
        }

        return response()->json($res, Api::$_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post_data = $request->input('body');
        $user = User::findOrFail($id);
        $user->name      = $post_data['user']['name'];
        $user->email     = $post_data['user']['email'];
        $user->gender    = $post_data['user']['gender'];
        $user->hobbies   = $post_data['user']['hobbies'];
        $user->countries = $post_data['user']['countries'];
        $user->note      = $post_data['user']['note'];
        $user->avatar    = $post_data['avatar'];
        if (!empty ($post_data['user']['password'])) {
            $user->password = bcrypt($post_data['user']['password']);
        }
        $user->save();

        $res = [
            'data' => $user,
            'status' => Api::$_CREATED,
            'message' => 'Cập nhật user thành công'
        ];
        return response($res, Api::$_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Method kiểm tra email đã tồn tại trong hệ thống hay chưa
     * @param  string $email :Email nhập vào
     * @return số lượng bản ghi tồn tại
     */
    private function checkEmail($email)
    {
        $count = User::where('email', '=', $email)->count();
        if ($count > 0) {
            return response()->json(
                [
                    'status' => Api::$_OK,
                    'message' => 'Email đã tồn tại',
                    'type' => Api::$_ERROR
                ]
            , Api::$_OK
            );
        }
        return Api::$_PASS;
    }
} // End class

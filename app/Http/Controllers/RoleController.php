<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Api;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id', 'DESC')->get();
        $res = array(
            'status' => Api::$_OK,
            'data' => $roles
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
        $post_data = $request->all();
        $role      = Role::create($post_data['body']);
        $res       = array(
            'status'  => Api::$_CREATED,
            'message' => 'Tạo nhóm người dùng thành công',
            'data'    => $role
        );
        return response()->json($role, Api::$_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        if ($role) {
            $res = array(
                'status' => Api::$_OK,
                'data' => $role
            );
            return response()->json($res);
        }
        else {
            return response()->json(['status' => '404', 'message' => 'No content'], 204);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        if ($role) {
            $res = array(
                'status' => Api::$_OK,
                'data' => $role
            );
        }
        else {
            $res = array(
                'status' => Api::$_NOTFOUND,
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
        $post_data = $request->all();
        $role      = Role::where('id', '=', $id)
                         ->update($post_data['body']);

        $res       = array(
            'status'  => Api::$_CREATED,
            'message' => 'Cập nhật nhóm người dùng thành công',
            'data'    => $role
        );
        return response()->json($role, Api::$_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id)->delete();
        $res = array(
            'status' => Api::$_NOCONTENT,
            'message' => 'Xóa role thành công'
        );
        return response()->json($res, Api::$_OK);
    }
}

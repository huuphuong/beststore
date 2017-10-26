<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Navigation;
use App\Api;

class NavigationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $parent = !empty($request->parent) ? $request->parent : 0;
        $navigations = \DB::table('navigations')->where('parent_id', $parent)->orderBy('position', 'ASC')->get();
        // $navigations = \DB::table('navigations')->orderBy('position', 'ASC')->get();
        $res = Api::resourceApi(Api::$_OK, $navigations);
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
        try {
            $navigation = new Navigation();
            $navigation->text_link = $request->text_link;
            $navigation->url = $request->url;
            $navigation->display = $request->display;
            $navigation->position = $request->position;
            $navigation->parent_id = !empty($request->parent_id) ? $request->parent_id : 0;

            $imageName = uniqid() . '.jpg';
            $path = public_path() . '/thumbnail/' . $imageName;
            $saveFile = file_put_contents($path, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->image)));

            if ($saveFile) {
                $navigation->image = asset('thumbnail/' . $imageName);
            }

            $navigation->save();

            $res = Api::resourceApi(Api::$_CREATED, 'Created navigation has been success');
        } catch (\Exception $e) {
            $res = Api::resourceApi($e->getCode(), $e->getCode());
        }

        return response()->json($res, Api::$_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $navigation = Navigation::findOrFail($id);
            $parent_id =  $navigation->parent_id;
            $parent = Navigation::find($parent_id);
            if (!empty ($parent)) {
                $navigation->parent_id = $parent->text_link;
            }else {
                $navigation->parent_id = '';
            }

            $navigation->childs = Navigation::where('parent_id', $id)
                                            ->orderBy('position', 'ASC')
                                            ->get()
                                            ->toArray();
            $res = Api::resourceApi(Api::$_OK, $navigation);
        } catch (\Exception $e) {
            $res = Api::resourceApi($e->getCode(), $e->getMessage());
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
        try {
            $navigation = Navigation::findOrFail($id);
            $res = Api::resourceApi(Api::$_OK, $navigation);
        } catch (\Exception $e) {
            $res = Api::resourceApi($e->getCode(), $e->getMessage());
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
        try {
            $navigation = Navigation::findOrFail($id);
            $currentImage = $navigation->image;

            $navigation->text_link = $request->text_link;
            $navigation->url = $request->url;
            $navigation->display = $request->display;
            $navigation->position = $request->position;
            $navigation->parent_id = !empty($request->parent_id) ? $request->parent_id : 0;

            if ($currentImage != $request->image) {
                $imageName = uniqid() . '.jpg';
                $path = public_path() . '/thumbnail/' . $imageName;
                $saveFile = file_put_contents($path, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->image)));

                if ($saveFile) {
                    $navigation->image = asset('thumbnail/' . $imageName);
                }
            }

            $navigation->save();

            $res = Api::resourceApi(Api::$_CREATED, 'Update navigation has been success');
        } catch (\Exception $e) {
            $res = Api::resourceApi($e->getCode(), $e->getMessage());
        }

        return response()->json($res, Api::$_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $nav = Navigation::findOrFail($id)->delete();
            $res = Api::resourceApi(Api::$_CREATED, 'Delete this navigation has been success');
        } catch (\Exception $e) {
            $res = Api::resourceApi($e->getCode(), $e->getMessage());
        }
        
        return response()->json($res, Api::$_OK);
    }


    public function getParents() {
        $parents = Navigation::where('parent_id', 0)
                             ->get()
                             ->toArray();
        $res = Api::resourceApi(Api::$_OK, $parents);
        return response()->json($res, Api::$_OK);
    }


    public function restore(Request $request) {
        try {
            $id = $request->navigation;

            Navigation::withTrashed()->where('id', $id)
                                     ->restore();

            $res = Api::resourceApi(Api::$_OK, 'Restore navigation has been success');
        } catch (\Exception $e) {
            $res = Api::resourceApi($e->getCode(), $e->getMessage());
        }
        
        return response()->json($res, Api::$_OK);
    }


    public function updatePosition(Request $request)
    {
        $post_data = $request->all();
        foreach ($post_data AS $key => $val)
        {
            $nav = Navigation::findOrFail($val['id']);
            $nav->position = $key;
            $nav->save();
        }

        $res = Api::resourceApi(Api::$_CREATED, 'Update position has been success');
        return response()->json($res, Api::$_OK);
    }
} // End class

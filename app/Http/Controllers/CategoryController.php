<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Api;
use App\Helpers\AppHelper;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $helper = new AppHelper();
        $categories = Category::select('cat_id', 'cat_name', 'parent_cat_id')->get()->toArray();

        $res = array(
            'status' => Api::$_OK,
            'data' => $helper->recusive($categories)
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
        try {
            $post_data = $request->all()['category'];
            $category = new Category();
            $category->cat_name      = $post_data['cat_name'];
            $category->cat_slug      = str_slug($post_data['cat_name']);
            $category->cat_desc      = $post_data['desc'];
            $category->display       = $post_data['display'];
            $category->position      = $post_data['position'];
            $category->parent_cat_id = $post_data['parent_cat_id'];
            $category->seo_title     = $post_data['seo_title'];
            $category->seo_keyword   = $post_data['seo_keyword'];
            $category->seo_desc      = $post_data['seo_desc'];
            $category->seo_robot     = $post_data['seo_robot'];
            $category->seo_revisit   = $post_data['seo_revisit'];
            $category->seo_copyright = $post_data['seo_copyright'];
            $category->save();

            $res = Api::resourceApi(Api::$_CREATED, $category);
        } catch (Exception $e) {
            $message = 'Can not create new category';
            $res = Api::resourceApi(Api::$_SERVERERROR, $message);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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


    public function countPosition(Request $request) 
    {
        $count = Category::whereRaw('1=1');
        if ($request->has('category'))
        {
            $count = $count->where('parent_cat_id', $request->category);
        }
        else {
            $count = $count->where(function ($query) {
                $query->where('parent_cat_id', 0)
                     ->orWhereNull('parent_cat_id');
            });
        }

        $count = $count->count();
        
        $res = Api::resourceApi(Api::$_OK, $count+1);
        return response()->json($res, Api::$_OK);
    }
}

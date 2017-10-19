<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutorial;
use App\Api;
use Cache;

class TutorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = Api::resourceApi(Api::$_OK, Tutorial::all());
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
        $tutorials = Tutorial::all();
        $currentImage = $tutorials[0]->background;

        try {
            Tutorial::truncate();

            $tutorial          = new Tutorial();
            $tutorial->title   = $request->title;
            $tutorial->icon1   = trim($request->icon1);
            $tutorial->action1 = $request->action1;
            $tutorial->desc1   = $request->desc1;
            $tutorial->icon2   = trim($request->icon2);
            $tutorial->action2 = $request->action2;
            $tutorial->desc2   = $request->desc2;
            $tutorial->icon3   = trim($request->icon3);
            $tutorial->action3 = $request->action3;
            $tutorial->desc3   = $request->desc3;
            $tutorial->display = 1;

            if ($currentImage != $request->background) {
                $imageName = uniqid() . '.jpg';
                $path = public_path() . '/thumbnail/' . $imageName;
                $saveFile = file_put_contents($path, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->background)));

                if ($saveFile) {
                    $tutorial->background = asset('thumbnail/' . $imageName);
                }
            }else {
                $tutorial->background = $currentImage;
            }


            $tutorial->save();

            $res = Api::resourceApi(Api::$_CREATED, 'Tutorial has been created');
        } catch (Exception $e) {
            $res = Api::resourceApi($e->getCode(), $e->getMessage());
        }
        
        
        Cache::forget(Tutorial::$cacheKey);
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
}

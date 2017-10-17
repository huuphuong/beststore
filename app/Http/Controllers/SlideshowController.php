<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slideshow;
use App\Api;

class SlideshowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            $slideshow            = new Slideshow();
            $slideshow->url       = $request->url;
            $slideshow->text_link = $request->text_link;
            $slideshow->display   = $request->display;
            $slideshow->position  = $request->position;

            $path = public_path() . '/thumbnail/' . uniqid() . '.jpg';
            $saveFile = file_put_contents($path, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->image)));

            if ($saveFile) {
                $slideshow->image = $path;
            }

            $slideshow->save();
            $res = Api::resourceApi(Api::$_CREATED, 'Create slideshow has been success');
        } catch (\Exception $e) {
            $res = Api::resourceApi($e->getCode(), $e->getMessage());
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
}

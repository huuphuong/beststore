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
        $slideshows = Slideshow::orderBy('display', 'ASC')
                               ->orderBy('position', 'ASC')
                               ->get()
                               ->toArray();

        // foreach ($slideshows AS $k => $slideshow)
        // {
        //     $slideshows[$k]['image'] = "<img src='".$slideshow['image']."' />";
        // }


        $res = Api::resourceApi(Api::$_OK, $slideshows);
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
            $slideshow            = new Slideshow();
            $slideshow->name      = $request->name;
            $slideshow->url       = $request->url;
            $slideshow->text_link = $request->text_link;
            $slideshow->display   = $request->display;
            $slideshow->position  = $request->position;

            $imageName = uniqid() . '.jpg';
            $path = public_path() . '/thumbnail/' . $imageName;
            $saveFile = file_put_contents($path, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->image)));

            if ($saveFile) {
                $slideshow->image = asset('thumbnail/' . $imageName);
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
        $slideshow = Slideshow::findOrFail($id);
        $res = Api::resourceApi(Api::$_OK, $slideshow);
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
        try {
            $slideshoe = Slideshow::findOrFail($id)
                                  ->delete();

            $message = 'Delete slide has been success';
            $res = Api::resourceApi(Api::$_CREATED, $message);
        } catch (\Exception $e) {
            $res = Api::resourceApi($e->getCode(), $e->getMessage());
        }

        return response()->json($res, Api::$_OK);
    }
}

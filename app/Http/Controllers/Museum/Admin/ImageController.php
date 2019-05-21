<?php

namespace App\Http\Controllers\Museum\Admin;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class ImageController extends Controller
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
        //
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

        if(!empty(Input::file('image'))) {
            $filename = Input::file('image')->getClientOriginalName();

            $path = Storage::disk('public')->putFileAs(
                'images/posts' . '/' . $id, $request->file('image'), $filename
            );

//        $path = public_path('uploads/image/');
//        $file_name = time() . "_" . Input::file('image')->getClientOriginalName();
//        Input::file('image')->move($path, $file_name);


            $data = array(
                'post_id' => $id,
                'name' => $filename,
                'alias' => $path,
            );

            $imgobject = new Image();
            $imgobject->create($data);
        }

        else  return back()
            ->withErrors(['msg' => 'Выберете изображение'])
            ->withInput();


        return back()->withInput()->with(['success' => 'Успешно сохранено']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $image = Image::find($id);

        Storage::disk('public')->delete($image['alias']);
        $image->delete();


        return back()->withInput();

    }
}

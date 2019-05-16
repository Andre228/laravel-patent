<?php

namespace App\Http\Controllers\Museum\Admin;

use App\Http\Requests\MuseumPostUpdateRequest;
use App\Image;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Support\Str;

class PostController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * @var $categoryRepository
     */
    private $postRepository;
    private $categoryRepository;

    public function __construct()
    {
        parent::__construct();

        $this->postRepository = app(PostRepository::class);
        $this->categoryRepository = app(CategoryRepository::class);
    }

    public function index()
    {
        $paginator = $this->postRepository->getAllWithPaginate();

        return view('museum.admin.post.index', compact('paginator'));
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
    public function store(Request $request, $id)
    {

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
        $url = \App\Models\Image::where('post_id', $id)->pluck('alias');

       // dd($url);
       // $link = null;
       // dd($url);
       // dd($url);

      //  $urltext = Storage::url('storage/123.jpg');
        if(empty($url)!== null)
        $imagelist = $url;

       // dd($imagelist);

        $item = $this->postRepository->getEdit($id);
        if(empty($item)) {
            abort(404);
        }

        $categoryList = $this->categoryRepository->getForComboBox();

       // return view('viewName', );

        return view('museum.admin.post.update.edit', ['item'=>$item,'categoryList'=>$categoryList,'imagelist'=>$imagelist]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MuseumPostUpdateRequest $request, $id)
    {
        $filename = Input::file('image')->getClientOriginalName();

        $path = Storage::disk('public')->putFileAs(
            'images/posts'.'/' . $id , $request->file('image'), $filename
        );

//        $path = public_path('uploads/image/');
//        $file_name = time() . "_" . Input::file('image')->getClientOriginalName();
//        Input::file('image')->move($path, $file_name);




        $data = array(
            'post_id' => $id,
            'name' => $filename,
            'alias' => $path,
        );

        $imgobject = new \App\Models\Image();
        $imgobject->create($data);


        $item = $this->postRepository->getEdit($id);


       if(empty($item)) {
           return back()->withErrors(['msg' => "Запись id=[{$id}] не найдена"])->withInput();
       }

       $data = $request->all();

        if(empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }
        if(empty($item->published_at) && $data['is_published']) {
            $data['published_at'] = Carbon::now();
        }

        $result = $item->update($data);

        if($result) {
            return redirect()
                ->route('museum.admin.posts.edit',$item->id)
                ->with(['success' => 'Успешно сохранено']);
        }
        else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd(__METHOD__, request()->all(), $id);
    }
}

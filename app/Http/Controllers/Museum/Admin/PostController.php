<?php

namespace App\Http\Controllers\Museum\Admin;

use App\Http\Requests\MuseumPostCreateRequest;
use App\Http\Requests\MuseumPostUpdateRequest;
use App\Image;
use App\Models\Post;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\DB;

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
        $item = new Post();
        $categoryList = $this->categoryRepository->getForComboBox();

        return view('museum.admin.post.add.create', compact('item','categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MuseumPostCreateRequest $request)
    {
        $data = $request->input();
        $item = (new Post())->create($data);

        if($item) {
            return redirect()->route('museum.admin.posts.edit', $item->id)->with(['success' => 'Успешно сохранено']);
        }
        else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])->withInput();
        }
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
        $url = DB::table('images')->select('alias','id')->where('post_id', $id)->get();


       if($url->isEmpty())
           $imagelist = null;


        if(empty($url)!== null)
        $imagelist = $url;


        $item = $this->postRepository->getEdit($id);
        if(empty($item)) {
            abort(404);
        }

        $categoryList = $this->categoryRepository->getForComboBox();


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

        $item = $this->postRepository->getEdit($id);


       if(empty($item)) {
           return back()->withErrors(['msg' => "Запись id=[{$id}] не найдена"])->withInput();
       }

       $data = $request->all();

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

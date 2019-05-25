<?php

namespace App\Http\Controllers\Museum;

use App\Models\Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Request;
use App\Models\Post;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;

class PostController extends BaseController
{


    private $postRepository;
    private $categoryRepository;

    public function __construct()
    {
      //  parent::__construct();

        $this->postRepository = app(PostRepository::class);
        $this->categoryRepository = app(CategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $paginator = $this->postRepository->getAllWithPaginateForUsers(31);
        return view('museum.posts.index', compact('paginator'));
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
        $post = $this->postRepository->showPost($id);

        $image = new Image();
        $alias = $image
            ->select('alias','name')
            ->where('post_id', $post['id'])
            ->get()
            ->toArray();

        return view('museum.posts.show', compact('post','alias'));
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

    public function showWithCountPosts(Request $request)
    {
        $count = Request::input('countpaginate');
        $search = Request::input('search');

        if(!empty($search)) {
            $paginator = $this->postRepository->getAllSearchWithPaginateForUsers($count, $search);
            return view('museum.posts.index', compact('paginator'));
        }

        else {
            $paginator = $this->postRepository->getAllWithPaginateForUsers($count);
            return view('museum.posts.index', compact('paginator'));
        }

    }


    public function showWithSortPosts()
    {
        $paginator = $this->postRepository->getAllWithGroupCategories();
        return view('museum.posts.index', compact('paginator'));
    }
}

<?php

namespace App\Http\Controllers\Museum;

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

    public function showWithCountPosts(Request $request)
    {
        $count = Request::input('countpaginate');
        $paginator = $this->postRepository->getAllWithPaginateForUsers($count);
        return view('museum.posts.index', compact('paginator'));

    }
}

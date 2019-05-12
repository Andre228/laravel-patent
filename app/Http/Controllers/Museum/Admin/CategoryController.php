<?php

namespace App\Http\Controllers\Museum\Admin;

use App\Http\Requests\MuseumCategoryCreateRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use App\Http\Requests\MuseumCategoryUpdateRequest;
use Illuminate\Support\Str;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * @var $categoryRepository
    */
    private $categoryRepository;

    public function __construct()
    {
        parent::__construct();

        $this->categoryRepository = app(CategoryRepository::class);
    }

    public function index()
    {
       // $dsd = Category::all();
      //  $paginator = Category::paginate(15);
        $paginator = $this->categoryRepository->getAllWithPaginate(5);

        return view('museum.admin.category.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//       $item = new Category();
//       $categotyList = Category::all();

        $item = new Category();
        $categotyList = $this->categoryRepository->getForComboBox();



       return view('museum.admin.category.add.create', compact('item', 'categotyList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MuseumCategoryCreateRequest $request)
    {
        $data = $request->input();
        if(empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

//        $item = new Category($data);
//        $item->save();

        $item = (new Category())->create($data);

        if($item) {
            return redirect()->route('museum.admin.categories.edit', $item->id)->with(['success' => 'Успешно сохранено']);
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
        dd(__METHOD__);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param CategoryRepository $categoryRepository
     * @return \Illuminate\Http\Response
     */
    public function edit($id,  CategoryRepository $categoryRepository)
    {
        $item = $categoryRepository->getEdit($id);
        if(empty($item)) {
            abort(404);
        }
        $categotyList = $categoryRepository->getForComboBox();
         return view('museum.admin.category.edit', compact('item', 'categotyList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MuseumCategoryUpdateRequest $request, $id)
    {

        $item = Category::find($id);
        if(empty($item)) {
            return back()->withErrors(['msg' => "Запись id=[{$id}] не найдена"])->withInput();
        }

        $data = $request->all();

        if(empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $result = $item->update($data);

        if($result) {
            return redirect()->route('museum.admin.categories.edit', $item->id)->with(['success' => 'Успешно сохранено']);
        }
        else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])->withInput();
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
        //
    }
}

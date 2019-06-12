<?php

namespace App\Http\Controllers\Museum\Admin;

use App\Models\Tour;
use App\Repositories\TourRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class TourController extends BaseController
{

    private $tourRepository;

    public function __construct()
    {
        parent::__construct();

        $this->tourRepository = app(TourRepository::class);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->tourRepository->getAllWithPaginate();

        return view('museum.admin.tour.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Tour();
        return view('museum.admin.tour.create', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input();
        $item = (new Tour())->create($data);

        if($item) {
            return redirect()->route('museum.admin.tour.edit', $item->id)->with(['success' => 'Успешно сохранено']);
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->tourRepository->getEdit($id);


        return view('museum.admin.tour.edit', compact('item'));
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
        $item = $this->tourRepository->getEdit($id);


        if(empty($item)) {
            return back()->withErrors(['msg' => "Запись id=[{$id}] не найдена"])->withInput();
        }

        $data = $request->all();


        if(empty($data['start_date'])) {
            $data['start_date'] = Carbon::now()->format('Y-m-d H:i:s');
        }
        $start_date = Carbon::parse($data['start_date'])->format('Y-m-d H:i:s');
        $data['start_date'] = $start_date;

        if(empty($data['end_date'])) {
            $data['end_date'] = Carbon::now()->format('Y-m-d H:i:s');
        }

        $end_date = Carbon::parse($data['end_date'])->format('Y-m-d H:i:s');
        $data['end_date'] = $end_date;

        $result = $item->update($data);

        if($result) {
            return redirect()
                ->route('museum.admin.tour.edit',$item->id)
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
        $del = $this->tourRepository->getEdit($id);
        $del->delete();


        if($del) {
            return redirect()
                ->route('museum.admin.tour.index')
                ->with(['success' => 'Успешно удалено']);
        }
    }
}

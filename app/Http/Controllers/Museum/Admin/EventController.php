<?php

namespace App\Http\Controllers\Museum\Admin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\EventRepository;
use Illuminate\Support\Carbon;

class EventController extends BaseController
{



    private $eventRepository;

    public function __construct()
    {
        parent::__construct();

        $this->eventRepository = app(EventRepository::class);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->eventRepository->getAllWithPaginate();

        return view('museum.admin.event.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Event();
        return view('museum.admin.event.create', compact('item'));

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
        $item = (new Event())->create($data);

        if($item) {
            return redirect()->route('museum.admin.event.edit', $item->id)->with(['success' => 'Успешно сохранено']);
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
        $item = $this->eventRepository->getEdit($id);

        //$start_date = $item->start_date;


        return view('museum.admin.event.edit', compact('item'));
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
        $item = $this->eventRepository->getEdit($id);


        if(empty($item)) {
            return back()->withErrors(['msg' => "Запись id=[{$id}] не найдена"])->withInput();
        }

        $data = $request->all();


        if(empty($data['start_date'])) {
            $data['start_date'] = Carbon::now()->format('Y-m-d H:i:s');
        }
        $start_date = Carbon::parse($data['start_date'])->format('Y-m-d H:i:s');
        $data['start_date'] = $start_date;

        if(!empty($data['end_date'])) {
            $end_date = Carbon::parse($data['end_date'])->format('Y-m-d H:i:s');
            $data['end_date'] = $end_date;
        }
        else {
            $data['end_date'] = null;
        }


        $result = $item->update($data);

        if($result) {
            return redirect()
                ->route('museum.admin.event.edit',$item->id)
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
        $del = $this->eventRepository->getEdit($id);
        $del->delete();


        if($del) {
            return redirect()
                ->route('museum.admin.event.index')
                ->with(['success' => 'Успешно удалено']);
        }
    }
}

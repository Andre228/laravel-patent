<?php

namespace App\Http\Controllers\Museum;

use App\Models\Tour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TourRepository;

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

        return view('museum.tours.index', compact('paginator'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = $this->tourRepository->getEdit($id);

        return view('museum.tours.show', compact('item'));
    }

    public function showWithCountTours(Request $request)
    {

        $count = $request->input('countpaginate');
        $search  = $request->input('search');

        if(!empty($search)) {
            $paginator = $this->tourRepository->getAllSearchWithPaginateForUsers($search, $count);
            return view('museum.tours.index', compact('paginator'));
        }

        else {
            $paginator = $this->tourRepository->getAllWithPaginateForUsers($count);
            return view('museum.tours.index', compact('paginator'));
        }
    }

    public function showOldTours(Request $request)
    {
        $count = $request->input('countpaginate');

        $paginator = $this->tourRepository->getOldTours($count);

        return view('museum.tours.index', compact('paginator'));

    }

    public function showCurrentTours(Request $request)
    {
        $count = $request->input('countpaginate');

        $paginator = $this->tourRepository->getCurrentTours($count);

        return view('museum.tours.index', compact('paginator'));

    }

    public function showFuturetTours(Request $request)
    {
        $count = $request->input('countpaginate');

        $paginator = $this->tourRepository->getFutureTours($count);

        return view('museum.tours.index', compact('paginator'));

    }

}

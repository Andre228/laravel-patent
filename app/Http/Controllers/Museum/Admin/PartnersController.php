<?php

namespace App\Http\Controllers\Museum\Admin;

use App\Models\Partner;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PartnersController extends BaseController
{
    private $contactRepository;

    public function __construct()
    {
        parent::__construct();

        $this->contactRepository = app(ContactRepository::class);
    }

    public function index()
    {

        $paginator = $this->contactRepository->getAllPartners();
        return view('museum.admin.partner.index', compact('paginator'));
    }


    public function edit($id)
    {

        $item = DB::table('partners')->find($id);

        return view('museum.admin.partner.edit', compact('item'));
    }


    public function update(Request $request, $id)
    {

        $item = DB::table('partners')->find($id);


        $result = DB::table('partners')->where('id',$id)
            ->update(['name' => $request->name, 'link' => $request->link, 'updated_at' => now()]);


        if($result) {
            return redirect()
                ->route('museum.admin.partners.edit',$item->id)
                ->with(['success' => 'Успешно сохранено']);
        }
        else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }




    public function create(Request $request)
    {

        $item = new Partner();

        return view('museum.admin.partner.create', compact('item'));
    }


    public function store(Request $request)
    {
        $data = $request->input();
        $item = (new Partner())->create($data);

        if($item) {
            return redirect()->route('museum.admin.partners.edit', $item->id)->with(['success' => 'Успешно сохранено']);
        }
        else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])->withInput();
        }
    }

    public function destroy($id)
    {
        $item = new Partner();
        $del = $item->find($id);
        $del->delete();


        if($del) {
            return redirect()
                ->route('museum.admin.partners.index')
                ->with(['success' => 'Успешно удалено']);
        }
    }
}

<?php

namespace App\Http\Controllers\Museum\Admin;

use App\Repositories\ContactRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends BaseController
{


    private $contactRepository;

    public function __construct()
    {
        parent::__construct();

        $this->contactRepository = app(ContactRepository::class);
    }


    public function edit($id)
    {
        $item = $this->contactRepository->getAllFields();

        return view('museum.admin.contact.edit', compact('item'));
    }


    public function update(Request $request, $id)
    {
        $item = $this->contactRepository->getEdit(1);

        $data = $request->all();

        $result = $item->update($data);

        if($result) {
            return redirect()
                ->route('museum.admin.contact.edit',1)
                ->with(['success' => 'Успешно сохранено']);
        }
        else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }
}

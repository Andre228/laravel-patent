<?php

namespace App\Http\Controllers\Museum\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function edit()
    {
        $abouts = DB::table('about')->find(1);

        return view('museum.admin.about.edit', compact('abouts'));
    }

    public function update(Request $request)
    {
        $data = $request->all();

        $result = DB::table('about')->where('id', 1)->update([
            'bigtitle' => $data['bigtitle'],
            'title1' => $data['title1'],
            'title2' => $data['title2'],
            'description1' => $data['description1'],
            'description2' => $data['description2'],
            'description3' => $data['description3'],
            'feature1' => $data['feature1'],
            'feature2' => $data['feature2'],
            'feature3' => $data['feature3'],
        ]);

        if($result) {
            return redirect()
                ->route('museum.admin.about.edit',1)
                ->with(['success' => 'Успешно сохранено']);
        }
        else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }
}

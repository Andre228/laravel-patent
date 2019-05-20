<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Museum\BaseController;
use App\Repositories\UsersRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $usersRepository;

    public function __construct()
    {
        $this->usersRepository = app(UsersRepository::class);
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $avatar = $this->usersRepository->getAvatar(Auth::user()->id);
        if(!empty($avatar[0]))
            $alias = $avatar[0];
        else $alias = 'pusto';

        $user = $this->usersRepository->getUserInfo(Auth::user()->id);


        return view('home', compact('user','alias'));
    }

    public function update(Request $request, $id)
    {

        $info = $request->all();
        $userAvatar = DB::table('users_avatars')
            ->select('alias')
            ->where('user_id',$id)
            ->get()
            ->toArray();


            if (!empty($info['file']) || !empty($userAvatar[0]->alias)) {

                $this->usersRepository->setAvatar($info['email'], $info['name'], $id , $request->file('file'));
                return redirect()->route('home')->with(['success' => 'Успешно сохранено']);

            }
            else if (empty($info['file']) && empty($userAvatar[0]->alias)) {

                return back()->withErrors(['msg' => 'Выберете изображение'])->withInput();
            }
            else {
                return back()->withErrors(['msg' => 'Произошла ошибка'])->withInput();
            }

    }


    public function about()
    {
        return view('museum.about');
    }
}

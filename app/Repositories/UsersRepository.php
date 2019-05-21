<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 20.05.2019
 * Time: 17:59
 */

namespace App\Repositories;

use App\User as Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;


class UsersRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }


    public function getAllWithPaginate()
    {
        $columns = [
            'id',
            'name',
            'email',
            'role',
            'created_at',
            'updated_at',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id','DESC')
            ->paginate(25);

        return $result;
    }

    public function getUserInfo($id)
    {
        $columns = [
            'id',
            'name',
            'email',
            'created_at'
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->find($id)
            ->toArray();

        return $result;
    }

    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    public function getAvatar($id)
    {
        $avatar = DB::table('users_avatars')
            ->select('alias')
            ->where('user_id',$id)
            ->get()
            ->toArray();

        return $avatar;
    }

    public function setAvatar($email, $name, $id, $file)
    {
        $avatarIsEmpty = DB::table('users_avatars')
            ->select('alias')
            ->where('user_id', $id)
            ->get()
            ->toArray();


        if (!empty($avatarIsEmpty && $file)) {


            Storage::disk('public')->delete($avatarIsEmpty[0]->alias);


            $filename = Input::file('file')->getClientOriginalName();

            $path = Storage::disk('public')->putFileAs(
                'images/avatars' . '/' . $id, $file, $filename
            );

            $data = array(
                'name' => $filename,
                'alias' => $path,
            );

            $avatar = DB::table('users_avatars')->where('user_id', $id)->update($data);


        } else {
            $userchanges = array(
                'email' => $email,
                'name' => $name,
            );

            $user = $this->getEdit($id);
            $user->update($userchanges);

            if (!empty(Input::file('file'))) {

                $filename = Input::file('file')->getClientOriginalName();

                $path = Storage::disk('public')->putFileAs(
                    'images/avatars' . '/' . $id, $file, $filename
                );

                $data = array(
                    'user_id' => $id,
                    'name' => $filename,
                    'alias' => $path,
                );

                $avatar = DB::table('users_avatars')->insert($data);
            }
        }
    }

}
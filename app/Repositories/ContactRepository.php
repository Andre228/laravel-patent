<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 22.05.2019
 * Time: 13:31
 */

namespace App\Repositories;

use App\Models\Contact as Model;
use Illuminate\Support\Facades\DB;


class ContactRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }


    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }


    public function getAllFields()
    {
        $columns = [
            'id',
            'email',
            'instagram',
            'twitter',
            'facebook',
            'phone1',
            'phone2',
            'created_at',
            'updated_at',
            'title',
            'subtitle'
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->find(1);


        return $result;
    }


    public function getAllPartners()
    {
        $columns = [
            'id',
            'name',
            'link',
            'created_at',
            'updated_at'

        ];

        $result = DB::table('partners')
            ->select($columns)
            ->paginate(8);


        return $result;
    }
}
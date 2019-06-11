<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 11.06.2019
 * Time: 17:19
 */

namespace App\Repositories;

use App\Models\Event as Model;


class EventRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate()
    {
        $columns = [
            'id',
            'title',
            'description',
            'start_date',
            'end_date'
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id','DESC')
            ->paginate(25);

        return $result;
    }


    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }
}
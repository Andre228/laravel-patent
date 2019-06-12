<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 12.06.2019
 * Time: 17:12
 */

namespace App\Repositories;

use App\Models\Tour as Model;


class TourRepository extends CoreRepository
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
            'topic',
            'description',
            'cost',
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
<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 12.05.2019
 * Time: 12:04
 */

namespace App\Repositories;

use App\Models\Category as Model;
use Illuminate\Database\Eloquent\Collection;


class CategoryRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    public function getForComboBox()
    {
        //return $this->startConditions()->all();

        $columns = implode(', ', [
            'id',
            'CONCAT (id, ". ", title) AS id_title'
        ]);

//        $result[] = $this->startConditions()->all();
//        $result[] = $this->startConditions()
//            ->select('categories.*', \DB::raw('CONCAT (id, ". ", title) AS id_title'))
//            ->toBase()
//            ->get();

        $result = $this->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();


        return $result;
    }

    public function getAllWithPaginate($perPage = null)
    {
        $columns = ['id', 'title', 'parent_id'];

        $result = $this->startConditions()->select($columns)->paginate($perPage);

        return $result;
    }

}
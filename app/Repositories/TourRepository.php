<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 12.06.2019
 * Time: 17:12
 */

namespace App\Repositories;

use App\Models\Tour as Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


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
            ->paginate(31);

        return $result;
    }


    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    public function getNewTours()
    {
        $columns = [
            'id',
            'title',
            'description',
            'topic',
            'start_date',
            'end_date',
            'cost',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->where('start_date' ,'>', Carbon::now()->format('Y-m-d'))
            ->orderBy('id','DESC')
            ->limit(3)
            ->get()
            ->toArray();

        return $result;
    }


    public function getAllSearchWithPaginateForUsers($search, $count)
    {


        $results =  DB::table('tours')
            ->select('title', 'description', 'topic', 'start_date', 'end_date')
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->orWhere('topic', 'LIKE', "%{$search}%")
            ->paginate($count);




        return $results;
    }

    public function getAllWithPaginateForUsers($perPage)
    {

        $columns = [
            'id',
            'title',
            'description',
            'topic',
            'start_date',
            'end_date',
            'cost',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id','DESC')
            ->paginate($perPage);

        return $result;

    }

    public function getOldTours($perPage)
    {
        $columns = [
            'id',
            'title',
            'description',
            'topic',
            'start_date',
            'end_date',
            'cost',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->where('end_date' ,'<', Carbon::now()->format('Y-m-d'))
            ->orderBy('id','DESC')
            ->paginate($perPage);



        return $result;
    }



    public function getCurrentTours($perPage)
    {
        $columns = [
            'id',
            'title',
            'description',
            'topic',
            'start_date',
            'end_date',
            'cost',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->where('end_date' ,'>', Carbon::now()->format('Y-m-d'))
            ->where('start_date' ,'<', Carbon::now()->format('Y-m-d'))
            ->orderBy('id','DESC')
            ->paginate($perPage);

        return $result;
    }


    public function getFutureTours($perPage)
    {
        $columns = [
            'id',
            'title',
            'description',
            'topic',
            'start_date',
            'end_date',
            'cost',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->where('start_date' ,'>', Carbon::now()->format('Y-m-d'))
            ->orderBy('id','DESC')
            ->paginate($perPage);

        return $result;
    }


}
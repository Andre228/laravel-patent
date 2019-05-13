<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 12.05.2019
 * Time: 20:37
 */

namespace App\Repositories;

use App\Models\Post as Model;


class PostRepository extends CoreRepository
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
            'slug',
            'is_published',
            'published_at',
            'user_id',
            'category_id'
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id','DESC')
            ->with([
                'category' => function ($query) {
                    $query->select(['id','title']);
                },
                'user:id,name'
            ])
            ->paginate(25);

        return $result;
    }

}
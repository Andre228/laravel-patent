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


    public function getAllWithPaginateForUsers($perPage)
    {
        $columns = [
            'id',
            'title',
            'slug',
            'created_at',
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
            ->paginate($perPage);

        return $result;
    }

    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    public function getNewPosts()
    {

        $columns = [
            'id',
            'title',
            'excerpt',
            'published_at',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->where('is_published', 1)
            ->orderBy('published_at', 'DESC')
            ->limit(4)
            ->get()->toArray();

        return $result;

    }

}
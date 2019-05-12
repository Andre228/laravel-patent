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

}
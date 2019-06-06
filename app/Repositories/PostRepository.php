<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 12.05.2019
 * Time: 20:37
 */

namespace App\Repositories;

use App\Models\Post as Model;
use App\Models\Post;
use Illuminate\Support\Facades\DB;


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
            'title as posttitle',
            'slug',
            'excerpt',
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

//        select p.id, p.title, p.excerpt, p.published_at, p.post_id
//from posts p JOIN images i on p.id = i.post_id
//where p.is_published = 1 and p.deleted_at is null ORDER by p.published_at desc limit 4

    }

    public function showPost($id)
    {

        $columns = [
            'id',
            'title',
            'excerpt',
            'published_at',
            'updated_at',
            'content_raw'
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->find($id)
            ->toArray();


        return $result;

    }



    public function getAllSearchWithPaginateForUsers($count, $search)
    {

//        $results = $this->startConditions()
//            ->where('title', 'LIKE', "%{$search}%")
//            ->orWhere('excerpt', 'LIKE', "%{$search}%")
//            ->paginate($count);


      //  ->join('categories', 'posts.category_id', '=', 'categories.id')
       // dd($count);


        $results =  DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.title as posttitle', 'posts.excerpt', 'categories.title as cattitle', 'posts.is_published', 'posts.created_at' ,'posts.id')
            ->where('posts.title', 'LIKE', "%{$search}%")
            ->orWhere('posts.excerpt', 'LIKE', "%{$search}%")
            ->orWhere('categories.title', 'LIKE', "%{$search}%")
            ->paginate($count);



        return $results;

    }


    public function getAllWithGroupCategories()
    {
        $results =  DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.title as posttitle', 'posts.excerpt',
                'categories.title as cattitle', 'posts.is_published', 'posts.created_at' ,'posts.id')
            ->groupBy('categories.id','posts.id')
            ->paginate(31);



        return $results;
    }

}
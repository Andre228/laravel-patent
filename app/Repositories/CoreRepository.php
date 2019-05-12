<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 12.05.2019
 * Time: 12:05
 */

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;


abstract class CoreRepository
{
    /**
     * @var Model
    */
    protected $model;

    public function __construct()
    {
        //new работает в разы быстрее, но с помощью app нужно создавать объекты, которые могут быть потенциально заменены
        //саму модель будет сюда передавать потомок

        $this->model = app($this->getModelClass());
    }

    /**
     * @return mixed
     */
    abstract protected function getModelClass();


    /**
     * @return Model|\Illuminate\Foundation\Application\mixed
     */
    protected function startConditions()
    {
        //clone чтобы не менять состояние самого объекта, а менять состояние клонов
        //чтобы не получилось так что у нас где-то были where и ещё какие-то запросы и в итоге мы получили бы не то что нам нужно,
        // так как объект был ужеусловно говоря занят

        return clone $this->model;
    }



}
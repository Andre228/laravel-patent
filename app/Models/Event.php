<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 11.06.2019
 * Time: 17:16
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date'
    ];

}
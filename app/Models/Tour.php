<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 12.06.2019
 * Time: 17:13
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable = [
        'title',
        'topic',
        'description',
        'cost',
        'start_date',
        'end_date'
    ];
}
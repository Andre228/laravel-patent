<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'email',
        'instagram',
        'twitter',
        'facebook',
        'phone1',
        'phone2',
        'created_at',
        'updated_at'
    ];

}

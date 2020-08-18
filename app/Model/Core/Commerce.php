<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;

class Commerce extends Model
{
    protected $fillable = 
    [
        'id',
        'name',
        'nit',
        'department',
        'city',
        'adress',
        'description',
        'logo',
        'currency',
        'label',
        'active'
    ];  

}

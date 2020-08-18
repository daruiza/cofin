<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = 
    [
        'id',
        'name',
        'number',
        'description',
        'dateStart',
        'dateEnd',
        'loop',
        'loopDate',
        'loopDay',
        'customer_id',
    ];
}

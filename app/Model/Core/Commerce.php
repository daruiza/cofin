<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;

use App\User;

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

    public function owner()
    {
        return $this->belongsTo(User::class,  'id', 'commerce_id')->where('rol_id', 2);
    }

}

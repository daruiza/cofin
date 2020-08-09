<?php

namespace App\Model\Core;

// use App\Model\Core\Clousure;
// use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Model;

class Commerce extends Model
{
    protected $fillable = ['id','name','nit','department','city','adress','description','logo','currency','label','active'];

  

}

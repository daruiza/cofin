<?php

namespace App\Model\Admin;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Acount extends Model
{
    protected $fillable = ['id','name','invoices','label','active'];

	//Una cuenta pertenece a varios usuarios
	public function users(){
		//no usa el namespace
        return $this->hasMany('App\User');
    }

    
   
}

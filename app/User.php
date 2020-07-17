<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //un usuario posee/pertenece un rol
    public function rol()
    {
        return $this->belongsTo(Model\Admin\Rol::class);
    }

    //un usuario posee una cuenta
    public function acount()
    {
        return $this->belongsTo(Model\Admin\Acount::class);
    }
    //a user may belongs a customers
    public function waiter()
    {
        return $this->belongsTo(Model\Core\Customers::class);
    }


    public function userPermitsApi($user_id)
    {
        $user = User::find($user_id);
        $permits = array();
        foreach ($user->rol()->get()[0]->options()->get() as $key => $option) {
            if (!array_key_exists($option->module()->get()[0]->name, $permits)) {
                $permits[$option->module()->get()[0]->name] = $option->module()->get()[0]->toArray();
                $permits[$option->module()->get()[0]->name]['label'] = json_decode($option->module()->get()[0]->label);
            }
            $permits[$option->module()->get()[0]->name]['options'][$option->id] = $option->toArray();
            $permits[$option->module()->get()[0]->name]['options'][$option->id]['label'] = json_decode($option->label);
        }
        return $permits;
    }
}

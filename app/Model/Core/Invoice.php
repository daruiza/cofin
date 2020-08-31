<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;

use App\Model\Core\Customer;

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
        'invoices_status_id',
        'customer_id',
    ];

    //una Invoice posee/pertenece a un customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

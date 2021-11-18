<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;

use App\Model\Core\Customer;

class Invoice extends Model
{
    protected $fillable = 
    [
        'id',
        'ticketId',
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

    //  tiene muchos Detalles
    public function datails(){
		//no usa el namespace
        // return $this->hasMany('App\InvoiceDetail');
        return $this->hasMany(InvoiceDetail::class,  'id', 'invoice_id');
    }


    public function scopeNumber($query, $number)
    {
        return is_null($number) ?  $query : $query->where('number', 'LIKE', $number);        
    }

    public function scopeTicketId($query, $ticketId)
    {
        return is_null($ticketId) ?  $query : $query->where('ticketId', 'LIKE', $ticketId);        
    }
}

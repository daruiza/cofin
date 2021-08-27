<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;

class InvoiceStatus extends Model
{
    protected $table = 'invoices_status';
    protected $fillable = 
    [
        'id',
        'name',
        'description',
    ];

    public function scopeName($query, $name)
    {
        return is_null($name) ?  $query : $query->where('name', 'LIKE', $name);        
    }
}

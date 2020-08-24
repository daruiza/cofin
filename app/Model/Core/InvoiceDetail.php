<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    protected $table = 'invoices_detail';
    protected $fillable = 
    [
        'id',
        'price',
        'volume',
        'description',
        'invoice_id',
    ];
}

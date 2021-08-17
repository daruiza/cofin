<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;

class EpaycoTransaction extends Model
{
    protected $fillable =
    [
        'id',
        'success',
        'title_response',
        'text_response',
        'last_action',
        'ref_payco',
        'factura',
        'descripcion',
        'valor',
        'iva',
        'baseiva',
        'moneda',
        'estado',
        'respuesta',
        'autorizacion',
        'recibo',
        'fecha',
        'urlbanco',
        'transactionID',
        'ticketId',
        'email',
        'cell_phone',
        'customer_id',
        'commerce_id',
    ];

    public function scopeFactura($query, $factura)
    {
        if ($factura !== 'undefined') {
            return $query->where('factura', 'LIKE', "$factura");
        }
    }

    public function scopeCustomerId($query, $customer_id)
    {
        return $customer_id ? $query->where('customer_id', 'LIKE', "$customer_id") : $query;        
    }


}

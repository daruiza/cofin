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
    ];

    public function scopeFactura($query, $factura)
    {
        if ($factura !== 'undefined') {
            return $query->where('factura', 'LIKE', "$factura");
        }
    }
}

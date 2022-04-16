<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;
use Mockery\Undefined;

class EpaycoTransaction extends Model
{
    protected $table = 'epayco_transactions';
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
        return $customer_id ? $query->where('epayco_transactions.customer_id', 'LIKE', $customer_id) : $query;
    }

    public function scopeTicketId($query, $ticketId)
    {
        return is_null($ticketId) ?  $query : $query->where('epayco_transactions.ticketId', $ticketId);
    }

    public function scopeSuccess($query, $success)
    {
        return is_null($success) ?  $query : $query->where('epayco_transactions.success', $success);
    }

    public function scopeEstado($query, $estado)
    {
        return $estado ? $query->where('epayco_transactions.estado', 'LIKE', $estado) : $query;
    }
}

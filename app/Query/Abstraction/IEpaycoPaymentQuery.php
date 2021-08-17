<?php

namespace App\Query\Abstraction;

use Illuminate\Http\Request;

interface IEpaycoPaymentQuery
{
    public function index(Request $request);
    public function bankList(Request $request, $id);
    public function confirmationPost(Request $request);
    public function store(Request $request, $id);
    public function show(Request $request, int  $commerceId, int $transactionId);
    public function showByInvoiceId(Request $request, int  $commerceId, int $invoiceId);
    public function customerIdentification(Request $request, int  $commerceId);    
    public function update(Request $request, int $id);
    public function destroy(Int $id);
    public function confirmationGet(Request $request);
}

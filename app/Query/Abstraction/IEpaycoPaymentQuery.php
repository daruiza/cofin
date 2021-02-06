<?php

namespace App\Query\Abstraction;

use Illuminate\Http\Request;

interface IEpaycoPaymentQuery {    
    public function index(Request $request);
    public function bankList(Request $request, $id);    
    public function storeTransaction(Request $request, $id);
    public function show(Request $request, int $id);
    public function update(Request $request, int $id);
    public function destroy(Int $id);    
}

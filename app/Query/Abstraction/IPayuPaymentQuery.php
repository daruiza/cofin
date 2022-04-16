<?php

namespace App\Query\Abstraction;

use Illuminate\Http\Request;

interface IPayuPaymentQuery {    
    public function index(Request $request);
    public function bankList(Request $request);    
    public function show(Request $request, int $id);
    public function store(Request $request);
    public function update(Request $request, int $id);
    public function destroy(Int $id);    
}
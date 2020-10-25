<?php

namespace App\Query\Abstraction;

use Illuminate\Http\Request;

interface ICustomerQuery {    
    public function index();
    public function show(Request $request);
    public function showByCommerce(Request $request);
    public function store(Request $request);
    public function update(Request $request, int $id);
    public function destroy(Int $id);    
}
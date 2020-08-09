<?php

namespace App\Query\Abstraction;

use Illuminate\Http\Request;

interface ICommerceQuery {    
    public function index();
    public function show(Int $id);
    public function store(Request $request);
    public function update(Request $request, Int $id);
    public function destroy(Int $id);    
}
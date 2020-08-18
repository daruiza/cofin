<?php

namespace App\Query\Request;

use App\User;
use App\Model\Core\Commerce;
use Illuminate\Http\Request;
use App\Query\Abstraction\ICustomerQuery;


class CustomerQuery implements ICustomerQuery
{
    public function index()
    {
        return response()->json(['message' => 'Customer Index!'], 201);
    }
    public function show(Request $request, int $id)
    {
        return response()->json(['message' => 'Customer Show!'], 201);
    }
    public function store(Request $request)
    {
        return response()->json(['message' => 'Customer Store!'], 201);
    }
    public function update(Request $request, int $id)
    {
        return response()->json(['message' => 'Customer Update!'], 201);
    }
    public function destroy(Int $id)
    {
        return response()->json(['message' => 'Customer Destroy!'], 201);
    }
}

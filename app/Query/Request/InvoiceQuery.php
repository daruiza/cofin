<?php

namespace App\Query\Request;

use App\User;
use App\Model\Core\Commerce;
use Illuminate\Http\Request;
use App\Query\Abstraction\IInvoiceQuery;


class InvoiceQuery implements IInvoiceQuery
{
    public function index()
    {
        return response()->json(['message' => 'Invloice Index!'], 201);
    }
    public function show(Request $request, int $id)
    {
        return response()->json(['message' => 'Commerce Show!'], 201);
    }
    public function store(Request $request)
    {
        return response()->json(['message' => 'Commerce Store!'], 201);
    }
    public function update(Request $request, int $id)
    {
        return response()->json(['message' => 'Commerce Update!'], 201);
    }
    public function destroy(Int $id)
    {
        return response()->json(['message' => 'Commerce Destroy!'], 201);
    }
}

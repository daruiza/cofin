<?php

namespace App\Query\Request;

use App\User;
use App\Model\Core\Customer;
use Illuminate\Http\Request;
use App\Query\Abstraction\ICustomerQuery;

class CustomerQuery implements ICustomerQuery
{
    public function index()
    {
        return response()->json(['message' => 'Customer Index!'], 201);
    }
    public function show(Request $request)
    {
        $object = new User();
        $object->identification = $request->input('identification');
        $object->active = $request->input('active') ? $request->input('active') : 1;

        $limit = $request->input('limit') ? $request->input('limit') : 3;
        $sort = $request->input('sort') ? $request->input('sort') : 'ASC';
        $page = $request->input('page') ? $request->input('page') : 1;

        $customer =  User::select();
        $customer = $object->identification ? $customer->where('identification', $object->identification) : $customer;
        $customer = $customer            
            ->orderBy('id',  $sort)
            ->paginate($limit, ['*'], '', $page);

        return response()->json( $customer, 200);
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

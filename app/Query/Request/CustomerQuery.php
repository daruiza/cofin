<?php

namespace App\Query\Request;

use Illuminate\Support\Facades\DB;

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
        return response()->json(['message' => 'Customer show!'], 201);
    }

    public function showByCommerce(Request $request)
    {
        $userObject = new User();
        $userObject->identification = $request->input('identification');
        $userObject->active = $request->input('active') ? $request->input('active') : 1;

        $customerObject = new Customer();
        $customerObject->commerce_id = +$request->input('commerce_id');

        $limit = $request->input('limit') ? $request->input('limit') : 3;
        $sort = $request->input('sort') ? $request->input('sort') : 'asc';
        $page = $request->input('page') ? $request->input('page') : 1;

        $user =  User::select();
        $user = $userObject->identification ? $user->where('identification', $userObject->identification) : $user;
        $user = $user->get()->first();

        $customer =  Customer::select();
        $customer = $customerObject->commerce_id ? $customer->where('commerce_id', $customerObject->commerce_id) : $customer;
        $customer = $customer->get()->first();

        $action = '!Advertencia';

        if (!$user) {
            return response()->json([
                'message' => 'Verifica la Identificación diligenciada',
                'action' => $action
            ], 404);
        }

        if (!$customer) {
            return response()->json([
                'message' => 'Verifica el Comercio diligenciado',
                'action' => $action
            ], 404);
        }

        if ($user->id !== $customer->user->id) {
            return response()->json([
                'message' => 'El cliente no pertenece al commercio seleccionado',
                'action' => $action
            ], 404);
        }

        $invoices_status_production = 2;

        return response()->json([
            'user' => $user,
            'invoices' =>
            Customer::select(
                'invoices.id',
                'invoices.name',
                'invoices.number',
                'invoices.description',
                'invoices.dateStart',
                'invoices.dateEnd',
                'invoices.loop',
                'invoices.loopDate',
                'invoices.loopDay',
                'invoices.invoices_status_id',
                'invoices.customer_id',
                DB::raw('SUM(price * volume) as total_price')
            )

                ->leftJoin('invoices', 'customers.id', '=', 'invoices.customer_id')
                ->leftJoin('invoices_detail', 'invoices.id', '=', 'invoices_detail.invoice_id')
                ->where('user_id', $user->id)
                ->where('commerce_id', $customerObject->commerce_id)
                ->where('invoices_status_id', $invoices_status_production)
                ->orderBy('customers.id',  $sort)
                ->groupBy(
                    'invoices.id',
                    'invoices.name',
                    'invoices.number',
                    'invoices.description',
                    'invoices.dateStart',
                    'invoices.dateEnd',
                    'invoices.loop',
                    'invoices.loopDate',
                    'invoices.loopDay',
                    'invoices.invoices_status_id',
                    'invoices.customer_id',
                    'invoices_detail.invoice_id'
                )
                ->paginate($limit, ['*'], '', $page)
        ], 200);

        // return response()->json([
        //     'user' => $user,
        //     'invoices' => $customer->invoices->where('invoices_status_id', $invoices_status_production)
        // ], 200);
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

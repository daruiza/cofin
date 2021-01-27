<?php

namespace App\Query\Request;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Query\Abstraction\IEpaycoPaymentQuery;

use App\Model\Core\Commerce;

class EpaycoPaymentQuery implements IEpaycoPaymentQuery
{
    public function index(Request $request)
    {
        return response()->json(['message' => 'EPayco index!'], 201);
    }

    public function bankList(Request $request)
    {
        return response()->json(['message' => 'EPayco bacnList!'], 201);
    }


    public function show(Request $request, int $id)
    {
        return response()->json(['message' => 'EPayco Show!'], 201);
    }

    public function store(Request $request)
    {
        return response()->json(['message' => 'EPayco Show!'], 201);
    }

    public function update(Request $request, int $id)
    {
        return response()->json(['message' => 'EPayco Update!'], 201);
    }
    public function destroy(Int $id)
    {
        return response()->json(['message' => 'EPayco Destroy!'], 201);
    }

    protected function validator(array $data)
    {
        return response()->json(['message' => 'EPayco Destroy!'], 201);
    }

    protected function merchant(Commerce $commerce)
    {
        return [
            'apiLogin' => $commerce->apiLogin,
            'apiKey' =>  $commerce->apiKey
        ];
    }
}

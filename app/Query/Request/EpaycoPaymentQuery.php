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
        return response()->json(['message' => 'EPayco iNDEX!'], 201);
    }

    public function bankList(Request $request, $id)
    {
        if (!$id) {
            return response()->json(['message' => 'Commerce exist!'], 400);
        }
        try {
            $commerce = Commerce::findOrFail($id);
            $response = Http::withHeaders([
                'Accept' => 'application/json'
            ])->get(
                env('APP_EPAYCO_URL_BANKS', 'https://secure.payco.co/restpagos/pse/bancos.json'),
                [
                    'public_key' => 'ff5bc2b276e6ec690e3162727eb78ebb',
                ]
            );
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }


        return response()->json($response->json(), $response->status());
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

<?php

namespace App\Query\Request;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Query\Abstraction\IPayuPaymentQuery;

use App\Model\Core\Commerce;

class PayuPaymentQuery implements IPayuPaymentQuery
{
    public function index(Request $request)
    {
        if(!$request->input('id')) {
            return response()->json(['message' => 'Commerce exist!'], 400);
        }
        try {
            $commerce = Commerce::findOrFail($request->input('id'));
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }

        $response = Http::withHeaders([
            'Accept' => 'application/json'
        ])->post(
            env('APP_PAYU_URL'),
            [
                'test' => env('APP_PAYU_TEST'),
                'language' => env('APP_PAYU_LANGUAGE'),
                'command' => 'PING',
                'merchant' => $this->merchant($commerce)
            ]

        );

        return response()->json($response->json(), $response->status());
    }

    public function show(Request $request, int $id)
    {
        return response()->json(['message' => 'PayuPayment Show!'], 201);
    }

    public function store(Request $request)
    {
        return response()->json(['message' => 'PayuPayment Show!'], 201);
    }

    public function update(Request $request, int $id)
    {
        return response()->json(['message' => 'PayuPayment Update!'], 201);
    }
    public function destroy(Int $id)
    {
        return response()->json(['message' => 'PayuPayment Destroy!'], 201);
    }

    protected function validator(array $data)
    {
        return response()->json(['message' => 'PayuPayment Destroy!'], 201);
    }

    protected function merchant(Commerce $commerce)
    {
        return [
            'apiLogin' => $commerce->apiLogin,
            'apiKey' =>  $commerce->apiKey
        ];
    }
}

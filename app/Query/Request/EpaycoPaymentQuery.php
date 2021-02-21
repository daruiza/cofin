<?php

namespace App\Query\Request;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Query\Abstraction\IEpaycoPaymentQuery;

use App\Model\Core\Commerce;
use Epayco\Epayco;
use Epayco\Utils\PaycoAes;
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
                    'public_key'  => $commerce->EPapiKey,
                ]
            );
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }


        return response()->json($response->json(), $response->status());
    }

    public function storeTransaction(Request $request, $id)
    {
        if (!$id) {
            return response()->json(['message' => 'Commerce exist!'], 400);
        }
        try {
            $commerce = Commerce::findOrFail($id);
            
            $epayco = new Epayco([
                'apiKey' => $commerce->EPapiKey,
                'privateKey' => $commerce->EPprivateKey,
                'test' => false,
                'lenguage' => 'php'
            ]);

            $data = array(
                "bank" => $request->input('bank'),
                "invoice" => $request->input('invoice'),
                "value" => $request->input('value'),
                "type_person" => $request->input('type_person'),
                "doc_type" => $request->input('doc_type'),
                "doc_number" => $request->input('doc_number'),
                "name" => $request->input('name'),
                "email" => $request->input('email'),
                "cell_phone" => $request->input('cell_phone'),
                "url_response" =>env('APP_URL').'api/'.$request->input('url_response'),
                
                "last_name" => '',
                "description" =>'',
                "tax" => env('APP_EPAYCO_TAX'),
                "tax_base" => env('APP_EPAYCO_TAX_BASE'),
                "currency" => env('APP_EPAYCO_CURRENCY'),
                "country" => env('APP_EPAYCO_COUNTRY'),
                "url_confirmation" => env('APP_EPAYCO_URL_CONFIRMATION'),
                "method_confirmation" => env('APP_EPAYCO_METHOD_CONFIRMATION')
            );            
            
            return response()->json($data, 201);
            $pse = $epayco->bank->create($data);
           
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
        return response()->json($pse, 201);
    }

    public function show(Request $request, int $id)
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

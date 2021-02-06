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
                "bank" => "1007",
                "invoice" => "1472050778",
                "description" => "Pago pruebas",
                "value" => "10000",
                "tax" => "0",
                "tax_base" => "0",
                "currency" => "COP",
                "type_person" => "0",
                "doc_type" => "CC",
                "doc_number" => "1039420535",
                "name" => "daruiza",
                "last_name" => "PAYCO",
                "email" => "no-responder@payco.co",
                "country" => "CO",
                "cell_phone" => "3194062550",
                "url_response" => " http://midominio.com/respuesta.html",
                "url_confirmation" => "http://midominio.com/confirmation",
                "method_confirmation" => "POST"
            );

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

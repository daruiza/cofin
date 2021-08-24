<?php

namespace App\Query\Request;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Query\Abstraction\IEpaycoPaymentQuery;

use App\Model\Core\Commerce;
use Epayco\Epayco;
use Epayco\Utils\PaycoAes;
use App\Model\Core\EpaycoTransaction;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;


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
            $epayco = new Epayco([
                'apiKey' => $commerce->EPapiKey,
                'privateKey' => $commerce->EPprivateKey,
                'test' => false,
                'lenguage' => 'php'
            ]);
            $response = $epayco->bank->pseBank();
            return response()->json($response, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    public function store(Request $request, $id)
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

                "last_name" => $request->input('name'),
                "description" => '',
                "tax" => env('APP_EPAYCO_TAX'),
                "tax_base" => env('APP_EPAYCO_TAX_BASE'),
                "currency" => $commerce->currency ? $commerce->currency : env('APP_EPAYCO_CURRENCY', 'COP'),
                "country" => $commerce->country ? $commerce->country : env('APP_EPAYCO_COUNTRY', 'CO'),
                "url_response" => env('API_URL') . 'home/' . $request->input('url_response') . '/' . $request->input('invoice'),
                "url_confirmation" => env('APP_URL') . 'api/epaycopayment/' . env('APP_EPAYCO_URL_CONFIRMATION'),
                "method_confirmation" => env('APP_EPAYCO_METHOD_CONFIRMATION', 'POST')
            );

            Log::info('*-*-* storeTransaction Start*-*-*');
            Log::info(json_encode($data));

            $pse = $epayco->bank->create($data);
            Log::info('*-*-* $epayco->bank->create Start*-*-*');
            Log::info(json_encode($pse));

            if ($pse->success) {
                $epaycoTransaction = new EpaycoTransaction();
                $epaycoTransaction->success = $pse->success;
                $epaycoTransaction->title_response = $pse->title_response;
                $epaycoTransaction->text_response = $pse->text_response;
                $epaycoTransaction->last_action = $pse->last_action;
                $epaycoTransaction->ref_payco = $pse->data->ref_payco;
                $epaycoTransaction->factura = $pse->data->factura;
                $epaycoTransaction->descripcion = $pse->data->descripcion;
                $epaycoTransaction->valor = $pse->data->valor;
                $epaycoTransaction->iva = $pse->data->iva;
                $epaycoTransaction->baseiva = $pse->data->baseiva;
                $epaycoTransaction->moneda = $pse->data->moneda;
                $epaycoTransaction->estado = $pse->data->estado;
                $epaycoTransaction->respuesta = $pse->data->respuesta;
                $epaycoTransaction->autorizacion = $pse->data->autorizacion;
                $epaycoTransaction->recibo = $pse->data->recibo;
                $epaycoTransaction->fecha = Carbon::now();
                $epaycoTransaction->urlbanco = $pse->data->urlbanco;
                $epaycoTransaction->transactionID = $pse->data->transactionID;
                $epaycoTransaction->ticketId = $pse->data->ticketId;
                $epaycoTransaction->commerce_id = $commerce->id;
                $epaycoTransaction->customer_id = $data['doc_number'];
                $epaycoTransaction->email = $data['email'];
                $epaycoTransaction->cell_phone = $data['cell_phone'];
                $epaycoTransaction->save();
            }
        } catch (\Exception $e) {
            Log::info('*-*-* storeTransaction Error *-*-*');
            Log::error($e->getMessage());
            return response()->json(['message' => $e->getMessage()], 400);
        }

        Log::info('*-*-* storeTransaction End *-*-*');

        return response()->json($pse, 201);
    }

    public function confirmationPost(Request $request)
    {
        Log::info('Request Confirmation Epayco POST');
        Log::info(json_encode($request->input()));
        return response()->json($request, 201);
    }

    public function confirmationGet(Request $request)
    {
        Log::info('Request Confirmation Epayco GET');
        Log::info(json_encode($request->input()));
        return response()->json($request->input(), 201);
    }

    public function show(Request $request, int  $commerceId, int $transactionId)
    {
        if (!$commerceId) {
            return response()->json(['message' => 'Invoice not exist!'], 400);
        }
        try {
            $commerce = Commerce::findOrFail($commerceId);

            $epayco = new Epayco([
                'apiKey' => $commerce->EPapiKey,
                'privateKey' => $commerce->EPprivateKey,
                'test' => false,
                'lenguage' => 'php'
            ]);

            $response = $epayco->bank->get($transactionId);
            return response()->json($response, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    public function showByInvoiceId(Request $request, int  $commerceId, int $invoiceId)
    {
        if (!$commerceId) {
            return response()->json(['message' => 'Invoice not exist!'], 400);
        }
        try {
            $commerce = Commerce::findOrFail($commerceId);

            $epayco = new Epayco([
                'apiKey' => $commerce->EPapiKey,
                'privateKey' => $commerce->EPprivateKey,
                'test' => false,
                'lenguage' => 'php'
            ]);

            //$response = $transactionId ? $epayco->bank->get($transactionId) : $request->input();
            return response()->json($commerce, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    public function customerIdentification(Request $request, int  $commerceId)
    {
        if (!$commerceId) {
            return response()->json(['message' => 'Invoice not exist!'], 400);
        }
        try {
            $response =
                $request->input('CustomerIdentification') ?
                EpaycoTransaction::CustomerId($request->input('CustomerIdentification'))->Success(true)->first() :
                null;
            return response()->json($response, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    // Recibe una transacción y actualiza su estado
    public function update(Request $request, int $commerceId)
    {

        if (!$commerceId) {
            return response()->json(['message' => 'Invoice not exist!'], 400);
        }
        try {
            $transaction = $this->customerIdentification($request, $commerceId)->original;
            if ($transaction->ticketId) {
                $pse = $this->show($request, $commerceId, $transaction->ticketId)->original;
                $epaycoTransaction = EpaycoTransaction::TicketId($transaction->ticketId)->first();
                $epaycoTransaction->success = $pse->success;
                $epaycoTransaction->title_response = $pse->title_response;
                $epaycoTransaction->text_response = $pse->text_response;
                $epaycoTransaction->last_action = $pse->last_action;
                $epaycoTransaction->ref_payco = $pse->data->ref_payco;
                $epaycoTransaction->factura = $pse->data->factura;
                $epaycoTransaction->descripcion = $pse->data->descripcion;
                $epaycoTransaction->valor = $pse->data->valor;
                $epaycoTransaction->iva = $pse->data->iva;
                $epaycoTransaction->baseiva = $pse->data->baseiva;
                $epaycoTransaction->moneda = $pse->data->moneda;
                $epaycoTransaction->estado = $pse->data->estado;
                $epaycoTransaction->respuesta = $pse->data->respuesta;
                $epaycoTransaction->autorizacion = $pse->data->autorizacion;
                $epaycoTransaction->recibo = $pse->data->recibo;
                $epaycoTransaction->transactionID = $pse->data->transactionID;
                $epaycoTransaction->ticketId = $pse->data->ticketId;
                $epaycoTransaction->save();

                // Actualizamos las facturas involucradas

                
                return response()->json($epaycoTransaction, 201);
            }
            return response()->json(null, 404);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
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

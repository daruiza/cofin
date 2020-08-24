<?php

namespace App\Query\Request;

use Illuminate\Support\Facades\DB;
use Exception;

use App\User;
use App\Model\Core\Invoice;
use App\Model\Core\InvoiceDetail;
use Illuminate\Http\Request;
use App\Query\Abstraction\IInvoiceQuery;

use Illuminate\Support\Facades\Validator;

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
        if (!$this->validator($request->all())) {

            // Validación number - customer_id
            $validateUnique = Invoice::where('number', $request->input('number'))
                ->where('customer_id', $request->input('customer_id'))
                ->first();
            if (isset($validateUnique->id)) {
                return response()->json(['message' => 'Invoice Conflict!'], 409);
            }

            $newInvoice = (object)['id' => 0];

            try {
                // Inicio de transacción
                $exception = DB::transaction(function () use ($request, &$newInvoice) {
                    // Creamos una nueva 
                    $invoice = new Invoice();
                    $request->request->add(['invoices_status_id' => 1]);
                    $request->request->add(['active' => 1]);
                    $newInvoice = $invoice->create($request->input());

                    // add invoices_detail
                    $invoice_datails = $request->input('invoice_detail');

                    foreach ($invoice_datails as &$valor) {
                        $valor['invoice_id'] = $newInvoice->id;
                        $invoiceDetail = new InvoiceDetail();
                        $invoiceDetail->create($valor);
                    }

                    return response()->json(['id' => $newInvoice->id], 201);
                });

                if (is_null($exception->exception)) {
                    // El id de Invoice = $exception->original->id
                    return response()->json(['id' => $newInvoice->id], 200);
                } else {
                    throw new \Exception('Error Transaction');
                }
            } catch (\Exception $e) {
                return response()->json(['message' => $e->getMessage()], 400);
            }            
        }        
        return response()->json(['id' => $newInvoice->id], 200);
    }

    public function update(Request $request, int $id)
    {
        return response()->json(['message' => 'Commerce Update!'], 201);
    }
    public function destroy(Int $id)
    {
        return response()->json(['message' => 'Commerce Destroy!'], 201);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:128',
            'number' => 'string',
            'description' => 'max:256',
            'dateStart' => 'string',
            'dateEnd' => 'string',
            'loop' => 'numeric|digits_between:1,30',
            'loopDate' => 'string',
            'loopDay' => 'numeric|digits_between:1,7',
            'customer_id' => 'required',
        ])->fails();
    }
}

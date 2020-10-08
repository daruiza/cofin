<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Query\Abstraction\IInvoiceQuery;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendInvoice;
use App\Model\Core\Invoice;

class InvoiceController extends Controller
{
    private $InvoiceQuery;

    public function __construct(IInvoiceQuery $InvoiceQuery)
    {
        $this->InvoiceQuery = $InvoiceQuery;
    }

    /**
     * @OA\Get(
     *      path="/invoice/index",
     *      operationId="getAllInvoices",
     *      tags={"Invoice"},
     *      summary="Get All Invoices",
     *      description="Return Invoices",
     *      security={ {"bearer": {} }},     
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function index()
    {

        // consultamos las facturas vigentes
        foreach (Invoice::where('invoices_status_id', 2)->get() as $invoice) {
            $data = (object) array(
                'owner' => $invoice->customer->commerce->owner->toArray(),
                'commerce' => $invoice->customer->commerce->toArray(),
                'invoice' => $invoice->toArray(),
                'customer' => $invoice->customer->user->toArray(),
            );

            Mail::to($data->customer['email'])->send(new SendInvoice($data));
        }
        return $this->InvoiceQuery->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return '';
    }

    /**
     * @OA\Post(
     *       path="/invoice/store",
     *      operationId="storeInvoice",
     *      tags={"Invoice"},
     *      summary="Store Invoice",
     *      description="Store Invoice",
     *      security={ {"bearer": {} }},  
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Invoice")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function store(Request $request)
    {
        return $this->InvoiceQuery->store($request);
    }
}

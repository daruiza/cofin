<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Query\Abstraction\IInvoiceQuery;

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
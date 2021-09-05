<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Mail;
use App\Mail\SendInvoice;
use App\Model\Core\Invoice;
use App\Query\Abstraction\IEpaycoPaymentQuery;

class EPaycoPaymentController extends Controller
{
    private $EPaycoPaymentQuery;

    public function __construct(IEpaycoPaymentQuery $EPaycoPaymentQuery)
    {
        $this->EPaycoPaymentQuery = $EPaycoPaymentQuery;
    }

    /**
     * @OA\Get(
     *      path="/epaycopayment/index",
     *      operationId="getPingEPayco",
     *      tags={"EPaycoPayment"},
     *      summary="Get Ping EPayco",
     *      description="Return ping",    
     *      @OA\Parameter(
     *          name="id",
     *          description="Commerce id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),       
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
    public function index(Request $request)
    {
        return $this->EPaycoPaymentQuery->index($request);
    }

    /**
     * @OA\Get(
     *      path="/epaycopayment/banklist/{id}",
     *      operationId="getBankListEpayco",
     *      tags={"EPaycoPayment"},
     *      summary="Get Bank List EPayco",
     *      description="Return bank list",    
     *      @OA\Parameter(
     *          name="id",
     *          description="Commerce id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),       
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
    public function bankList(Request $request, $id)
    {
        return $this->EPaycoPaymentQuery->bankList($request, $id);
    }

    /**
     * @OA\Post(
     *      path="/epaycopayment/store/{id}",
     *      operationId="store",
     *      tags={"EPaycoPayment"},
     *      summary="Create a Transaction",
     *      description="Return a Transaction",
     *      @OA\Parameter(
     *          name="id",
     *          description="Commerce id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),    
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Transaction")
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
    public function store(Request $request, $id)
    {
        return $this->EPaycoPaymentQuery->store($request, $id);
    }

    /**
     * @OA\Get(
     *      path="/epaycopayment/show/{commerceId}/{transactionId}",
     *      operationId="show",
     *      tags={"EPaycoPayment"},
     *      summary="Show a Transaction",
     *      description="Return a Transaction",     
     *      @OA\Parameter(
     *          name="commerceId",
     *          description="Commerce Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     * *      @OA\Parameter(
     *          name="transactionId",
     *          description="transaction Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
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
     *   )
     */
    public function show(Request $request, int $commerceId, int $transactionId)
    {
        return $this->EPaycoPaymentQuery->show($request, $commerceId, $transactionId);
    }

    /**
     * @OA\Get(
     *      path="/epaycopayment/showByInvoiceId/{commerceId}/{invoiceId}",
     *      operationId="showByInvoiceId",
     *      tags={"EPaycoPayment"},
     *      summary="Show a Transaction",
     *      description="Return a Transaction",     
     *      @OA\Parameter(
     *          name="commerceId",
     *          description="Commerce Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     * *      @OA\Parameter(
     *          name="invoiceId",
     *          description="Invoice Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
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
     *   )
     */
    public function showByInvoiceId(Request $request, int $commerceId, string $invoiceId)
    {
        return $this->EPaycoPaymentQuery->showByInvoiceId($request, $commerceId, $invoiceId);
    }

    /**
     * @OA\Get(
     *      path="/epaycopayment/showByCustomerIdentification/{commerceId}",
     *      operationId="showByCustomerIdentification",
     *      tags={"EPaycoPayment"},
     *      summary="Show a Transaction",
     *      description="Return a Transaction",     
     *      @OA\Parameter(
     *          name="commerceId",
     *          description="Commerce Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     * *      @OA\Parameter(
     *          name="CustomerIdentification",
     *          description="Customer Identification",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),     * 
     *       @OA\Parameter(
     *          name="Estado",
     *          description="Estado de la trasaccion en base",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
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
     *   )
     */
    public function showByCustomerIdentification(Request $request, int $commerceId)
    {
        return $this->EPaycoPaymentQuery->customerIdentification($request, $commerceId);
    }

    /**
     * @OA\Get(
     *      path="/epaycopayment/update/{commerceId}",
     *      operationId="update",
     *      tags={"EPaycoPayment"},
     *      summary="Update a Transaction",
     *      description="Return a Transaction After Update",     
     *      @OA\Parameter(
     *          name="commerceId",
     *          description="Commerce Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="CustomerIdentification",
     *          description="Customer Identification",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="Estado",
     *          description="Transaction State",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
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
     *   )
     */
    public function update(Request $request, int $commerceId)
    {
        return $this->EPaycoPaymentQuery->update($request, $commerceId);
    }

    

    public function confirmationPost(Request $request)
    {
        return $this->EPaycoPaymentQuery->confirmationPost($request);
    }

    public function confirmationGet(Request $request)
    {
        return $this->EPaycoPaymentQuery->confirmationGet($request);
    }
   
}

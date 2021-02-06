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
     *      path="/epaycopayment/storetransaction/{id}",
     *      operationId="storeTransaction",
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
    public function storeTransaction(Request $request, $id)
    {   
        return $this->EPaycoPaymentQuery->storeTransaction($request, $id);
    }
   
}

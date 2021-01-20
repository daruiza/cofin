<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Query\Abstraction\IPayuPaymentQuery;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendInvoice;
use App\Model\Core\Invoice;

class PayuPaymentController extends Controller
{
    private $PayuPaymentQuery;

    public function __construct(IPayuPaymentQuery $PayuPaymentQuery)
    {
        $this->PayuPaymentQuery = $PayuPaymentQuery;
    }

    /**
     * @OA\Get(
     *      path="/payupayment/index",
     *      operationId="getPingPayU",
     *      tags={"PayUPayment"},
     *      summary="Get Ping PayU",
     *      description="Return ping",    
     *      @OA\Parameter(
     *          name="id",
     *          description="Commerce id",
     *          required=true,
     *          in="query",
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
        return $this->PayuPaymentQuery->index($request);
    }

    /**
     * @OA\Get(
     *      path="/payupayment/banklist",
     *      operationId="getBankListPayU",
     *      tags={"PayUPayment"},
     *      summary="Get Bank List PayU",
     *      description="Return bank list",    
     *      @OA\Parameter(
     *          name="id",
     *          description="Commerce id",
     *          required=true,
     *          in="query",
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
    public function bankList(Request $request)
    {   
        return $this->PayuPaymentQuery->bankList($request);
    }
   
}

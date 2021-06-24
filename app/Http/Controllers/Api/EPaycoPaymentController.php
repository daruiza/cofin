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
     *      path="/epaycopayment/show/{commerceId}/{invoiceId}",
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
     *          name="invoiceId",
     *          description="Invoice Id",
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
    public function show(Request $request, int $commerceId, int $invoiceId)
    {
        return $this->EPaycoPaymentQuery->show($request, $commerceId, $invoiceId);
    }

    public function confirmationPost(Request $request)
    {
        return $this->EPaycoPaymentQuery->confirmationPost($request);
    }

    public function confirmationGet(
        Request $request,
        int $x_cust_id_cliente,
        int $x_ref_payco,
        string $x_id_factura,
        string $x_id_invoice,
        string $x_description,
        int $x_amount,
        int $x_amount_country,
        int $x_amount_ok,
        int $x_tax,
        int $x_amount_base,
        string $x_currency_code,
        string $x_bank_name,
        string $x_cardnumber,
        string $x_quotas,
        string $x_respuesta,
        string $x_response,
        string $x_approval_code,
        string $x_transaction_id,
        string $x_fecha_transaccion,
        string $x_transaction_date,
        int $x_cod_respuesta,
        int $x_cod_response,
        string $x_response_reason_text,
        string $x_errorcode,
        int $x_cod_transaction_state,
        string $x_transaction_state,
        string $x_franchise,
        string $x_business,
        string $x_customer_doctype,
        string $x_customer_document,
        string $x_customer_name,
        string $x_customer_lastname,
        string $x_customer_email,
        string $x_customer_phone,
        string $x_customer_movil,
        string $x_customer_ind_pais,
        string $x_customer_country,
        string $x_customer_city,
        string $x_customer_address,
        string $x_customer_ip,
        string $x_signature,
        string $x_test_request,
        string $x_extra1,
        string $x_extra2,
        string $x_extra3,
        string $x_extra4,
        string $x_extra5,
        string $x_extra6,
        string $x_extra7,
        string $x_extra8,
        string $x_extra9,
        string $x_extra10
    ) {
        $requestGet = [
            'x_cust_id_cliente' => $x_cust_id_cliente,
            'x_ref_payco' => $x_ref_payco,
            'x_id_factura' => $x_id_factura,
            'x_id_invoice' => $x_id_invoice,
            'x_description' => $x_description,
            'x_amount' => $x_amount,
            'x_amount_country' => $x_amount_country,
            'x_amount_ok' => $x_amount_ok,
            'x_tax' => $x_tax,
            'x_amount_base' => $x_amount_base,
            'x_currency_code' => $x_currency_code,
            'x_bank_name' => $x_bank_name,
            'x_cardnumber' => $x_cardnumber,
            'x_quotas' => $x_quotas,
            'x_respuesta' => $x_respuesta,
            'x_response' => $x_response,
            'x_approval_code' => $x_approval_code,
            'x_transaction_id' => $x_transaction_id,
            'x_fecha_transaccion' => $x_fecha_transaccion,
            'x_transaction_date' => $x_transaction_date,
            'x_cod_respuesta' => $x_cod_respuesta,
            'x_cod_response' => $x_cod_response,
            'x_response_reason_text' => $x_response_reason_text,
            'x_errorcode' => $x_errorcode,
            'x_cod_transaction_state' => $x_cod_transaction_state,
            'x_transaction_state' => $x_transaction_state,
            'x_franchise' => $x_franchise,
            'x_business' => $x_business,
            'x_customer_doctype' => $x_customer_doctype,
            'x_customer_document' => $x_customer_document,
            'x_customer_name' => $x_customer_name,
            'x_customer_lastname' => $x_customer_lastname,
            'x_customer_email' => $x_customer_email,
            'x_customer_phone' => $x_customer_phone,
            'x_customer_movil' => $x_customer_movil,
            'x_customer_ind_pais' => $x_customer_ind_pais,
            'x_customer_country' => $x_customer_country,
            'x_customer_city' => $x_customer_city,
            'x_customer_address' => $x_customer_address,
            'x_customer_ip' => $x_customer_ip,
            'x_signature' => $x_signature,
            'x_test_request' => $x_test_request,
            'x_extra1' => $x_extra1,
            'x_extra2' => $x_extra2,
            'x_extra3' => $x_extra3,
            'x_extra4' => $x_extra4,
            'x_extra5' => $x_extra5,
            'x_extra6' => $x_extra6,
            'x_extra7' => $x_extra7,
            'x_extra8' => $x_extra8,
            'x_extra9' => $x_extra9,
            'x_extra10' => $x_extra10
        ];
        return $this->EPaycoPaymentQuery->confirmationGet($request, $requestGet);
    }
}

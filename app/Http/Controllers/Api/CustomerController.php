<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Query\Abstraction\ICustomerQuery;

class CustomerController extends Controller
{
    private $CustomerQuery;

    public function __construct(ICustomerQuery $CustomerQuery)
    {
        $this->CustomerQuery = $CustomerQuery;
    }

    /**
     * @OA\Get(
     *      path="/customer/index",
     *      operationId="getAllCustomers",
     *      tags={"Customer"},
     *      summary="Get All Customers",
     *      description="Return Customers",
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
        return $this->CustomerQuery->index();
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
     *      path="/customer/store",
     *      operationId="storeCustomer",
     *      tags={"Customer"},
     *      summary="Store Customer",
     *      description="Store Customer",
     *      security={ {"bearer": {} }},  
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Customer")
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
        return $this->CustomerQuery->store($request);
    }

    /**
     * @OA\Get(
     *      path="/customer/show",
     *      operationId="getIdCustomer",
     *      tags={"Customer"},
     *      summary="Get One IdCustomer",
     *      description="Return Customers",
     *      security={ {"bearer": {} }}, 
     *      @OA\Parameter(
     *          name="identification",
     *          description="User identification",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),  
     *      @OA\Parameter(
     *          name="commerce_id",
     *          description="Commerce Id",
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
    public function show(Request $request)
    {
        return $this->CustomerQuery->show($request);
    }

    /**
     * @OA\Get(
     *      path="/customer/showbycommerce",
     *      operationId="getCustomerByCommerce",
     *      tags={"Customer"},
     *      summary="Get One Customer",
     *      description="Return Customers",     
     *      @OA\Parameter(
     *          name="identification",
     *          description="User identification",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),  
     *      @OA\Parameter(
     *          name="commerce_id",
     *          description="Commerce Id",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="invoices_status_id",
     *          description="Commerce Id",
     *          required=false,
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
    public function showByCommerce(Request $request)
    {
        return $this->CustomerQuery->showByCommerce($request);
    }

    /**
     * @OA\Get(
     *      path="/customer/documenttypes",
     *      operationId="getDocumentTypes",
     *      tags={"Customer"},
     *      summary="Get Document Types",
     *      description="Return Document Types",     
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
    public function documentTypes(Request $request)
    {
        return $this->CustomerQuery->documentTypes($request);
    }

    /**
     * @OA\Get(
     *      path="/customer/persontypes",
     *      operationId="getPersonTypes",
     *      tags={"Customer"},
     *      summary="Get Person Types",
     *      description="Return Person Types",     
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
    public function personTypes(Request $request)
    {
        return $this->CustomerQuery->personTypes($request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return '';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return '';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return '';
    }
}

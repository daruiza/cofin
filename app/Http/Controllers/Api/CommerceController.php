<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailInvoice;
use App\Mail\SendInvoice;

use App\Query\Abstraction\ICommerceQuery;

class CommerceController extends Controller
{

    private $CommerceQuery;

    public function __construct(ICommerceQuery $CommerceQuery)
    {
        $this->CommerceQuery = $CommerceQuery;
    }


    /**
     * @OA\Get(
     *      path="/commerce/index",
     *      operationId="getAllCommerces",
     *      tags={"Commerce"},
     *      summary="Get All Commerces",
     *      description="Return Commerces",
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
        // Mail::to('daruiza@gmail.com')->send(new SendMailInvoice());

        $data = (object) array(
            'commerce' => array('name' => 'CommerceName'),
            'customer' => array('name' => 'CustomerName'),
            'invoice' => array('dateStart' => '06-08-2020'),
        );
        Mail::to('daruiza@gmail.com')->send(new SendInvoice($data));
        return $this->CommerceQuery->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @OA\Get(
     *      path="/commerce/show/{id}",
     *      operationId="getIdCommerce",
     *      tags={"Commerce"},
     *      summary="Get One IdCommerce",
     *      description="Return Commerces",
     *      security={ {"bearer": {} }},
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
    public function show(Request $request, $id)
    {
        return $this->CommerceQuery->show($request, $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

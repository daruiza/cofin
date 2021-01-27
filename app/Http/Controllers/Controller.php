<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Cofin Documentation",
 *      description="APP Portfolio Management",
 *      
 *      @OA\Contact(
 *          email="daruiza@gmail.com"
 *      ),
 *      @OA\License(
 *          name="Apache 2.0",
 *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="Cofin API Server"
 * )
 *
 * @OA\Tag(
 *     name="Auth",
 *     description="API EndPoints of Auth"
 * ) 
 * 
 * @OA\Tag(
 *     name="Commerce",
 *     description="API EndPoints of Commerces"
 * ) 
 * 
 * @OA\Tag(
 *     name="Customer",
 *     description="API EndPoints of Customer"
 * ) 
 * 
 * @OA\Tag(
 *     name="Invoice",
 *     description="API EndPoints of Invoice"
 * ) 
 * 
 * @OA\Tag(
 *     name="EPaycoPayment",
 *     description="API EndPoints of EPaycoPayment"
 * ) 
 * 
 * @OA\SecuritySchemes(
 *     securityDefinition="bearer",
 *      type="apiKey",
 *     in="header",
 *     name="Authorization"
 * )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

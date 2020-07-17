<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Query\Abstraction\IAuthQuery;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $AuthQuery;

    public function __construct(IAuthQuery $AuthQuery)
    {
        $this->AuthQuery = $AuthQuery;
    }


    //Para autenticación de APP
    public function signup(Request $request)
    {

        $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
        ]);

        $user = new User([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->save();
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }


    /**
     * @OA\Post(
     *      path="/auth/login",
     *      operationId="getToken",
     *      tags={"Auth"},
     *      summary="Get object Auth",
     *      description="Return Token",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/User")
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
    public function login(Request $request)
    {
        return $this->AuthQuery->login($request);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' =>
        'Successfully logged out']);
    }

    public function user(Request $request)
    {
        // return response()->json(['message' => 'User'], 201);
        return response()->json($request->user());
    }
}

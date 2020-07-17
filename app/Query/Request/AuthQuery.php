<?php

namespace App\Query\Request;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Query\Abstraction\IAuthQuery;
use Illuminate\Support\Facades\Auth;

Class AuthQuery implements IAuthQuery{

    public function login(Request $request){
        $request->validate([
            'email'       => 'required|string|email',
            'password'    => 'required|string',
        ]);

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Credenciales no autorizadas'], 401);
        }

        $user = $request->user();
        $usr = User::findOrFail($request->user()->id);
        $permits = $usr->userPermitsApi($request->user()->id);
        $user->permits = $permits;

        $tokenResult = $user->createToken(env('APP_NAME'));
        $token = $tokenResult->token;
        $token->expires_at = Carbon::now()->addDays(1);

        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type'   => 'Bearer',
            'expires_at'   => Carbon::parse(
                $tokenResult->token->expires_at
            )
                ->toDateTimeString(),
            'user'  => $user

        ]);

        // exit($request);
        // return response()->json(['message' => $request->all()], 201);
        // $token->expires_at = Carbon::now()->addWeeks(1);
    }
}
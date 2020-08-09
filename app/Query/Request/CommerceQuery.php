<?php

namespace App\Query\Request;

use Illuminate\Http\Request;
use App\Query\Abstraction\ICommerceQuery;


class CommerceQuery implements ICommerceQuery{

    public function index(){
        return response()->json(['message' => 'Commerce Index!'], 201);
    }
    public function show(Request $request, Int $id){
        $user = $request->user();
        return response()->json($user->commerce);
    }
    public function store(Request $request){
        return response()->json(['message' => 'Commerce store!'], 201);
    }
    public function update(Request $request, Int $id){
        return response()->json(['message' => 'Commerce update!'], 201);
    }
    public function destroy(Int $id){
        return response()->json(['message' => 'Commerce destroy!'], 201);
    }

}
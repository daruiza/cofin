<?php

namespace App\Query\Request;

use App\User;
use App\Model\Core\Commerce;
use Illuminate\Http\Request;
use App\Query\Abstraction\ICommerceQuery;


class CommerceQuery implements ICommerceQuery
{

    public function index()
    {
        return response()->json(['message' => 'Commerce Index!'], 201);
    }

    public function show(Request $request, Int $id)
    {
        $commerce = Commerce::find($id);
        return $commerce ?
            response()->json($commerce, 200) :
            response()->json(['message' => 'Commerce no exist!'], 404);
    }

    public function store(Request $request)
    {
        if (Commerce::where('name', $request->input('name'))->first()) {
            return response()->json(['message' => 'Commerce exist!'], 400);
        }

        // Creamos el nuevo comercio
        $commerce = new Commerce();
        $request->request->add(['active' => 1]);
        $newCommerce = $commerce->create($request->input());

        return response()->json(['id' => $newCommerce->id], 201);
    }

    public function display(Request $request, String $id)
    {
        $commerce = Commerce::where('name','LIKE',$id)->first();
        return $commerce ?
            response()->json($commerce, 200) :
            response()->json(['message' => 'Commerce no exist!'], 404);
    }

    public function update(Request $request, Int $id)
    {
        return response()->json(['message' => 'Commerce update!'], 201);
    }
    
    public function destroy(Int $id)
    {
        return response()->json(['message' => 'Commerce destroy!'], 201);
    }

    
}

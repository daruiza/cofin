<?php

namespace App\Query\Abstraction;

use Illuminate\Http\Request;

interface IAuthQuery {
    public function login(Request $request);
}
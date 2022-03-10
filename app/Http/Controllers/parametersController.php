<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use Illuminate\Http\Request;

class parametersController extends Controller
{
    //
    public function index()
    {
        $parameter = Parameter::get();
        $this->estructura_api->setResultado($parameter);
        return response()->json($this->estructura_api->toResponse(null));
    }
}

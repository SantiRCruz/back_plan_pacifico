<?php

namespace App\Http\Controllers;

use App\Models\Municipality;
use Illuminate\Http\Request;

class municipalitiesController extends Controller
{
    //
    public function index()
    {
        $municipality = Municipality::get();
        $this->estructura_api->setResultado($municipality);
        return response()->json($this->estructura_api->toResponse(null));
    }
}

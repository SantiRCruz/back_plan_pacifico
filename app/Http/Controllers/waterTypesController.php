<?php

namespace App\Http\Controllers;

use App\Models\WaterType;
use Illuminate\Http\Request;

class waterTypesController extends Controller
{
    //
    public function index()
    {
        $water_type = WaterType::get();
        $this->estructura_api->setResultado($water_type);
        return response()->json($this->estructura_api->toResponse(null));
    }
}

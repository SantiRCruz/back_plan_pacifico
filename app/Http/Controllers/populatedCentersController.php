<?php

namespace App\Http\Controllers;

use App\Models\PopulationCenters;
use Illuminate\Http\Request;

class populatedCentersController extends Controller
{
    //
    public function index()
    {
        $populations_center = PopulationCenters::get();
        $this->estructura_api->setResultado($populations_center);
        return response()->json($this->estructura_api->toResponse(null));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\PopulationCenters;
use Illuminate\Http\Request;

class populatedCentersController extends Controller
{
    //
    public function show($id_municipality)
    {
        $populated_centers = PopulationCenters::join('municipalities','municipality_id','id_municipality')
        ->where('id_municipality',$id_municipality)
        ->get();
        if (count($populated_centers)> 0) {
            $this->estructura_api->setResultado($populated_centers);
        } else {
            $this->estructura_api->setEstado('INF-001', 'INFO', 'No hay Centros Poblados');
        }
        return response()->json($this->estructura_api->ToResponse(null));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Municipality;
use Illuminate\Http\Request;

class municipalitiesController extends Controller
{
    public function index()
    {
        $municipalities = Municipality::get();
        $this->estructura_api->setResultado($municipalities);
        return response()->json($this->estructura_api->toResponse(null));
    }

    public function show($id_department)
    {
        $municipalities = Municipality::join('departments','department_id','id_department')
        ->where('id_department',$id_department)
        ->get();
        if (count($municipalities)> 0) {
            $this->estructura_api->setResultado($municipalities);
        } else {
            $this->estructura_api->setEstado('INF-001', 'INFO', 'No hay municipios');
        }
        return response()->json($this->estructura_api->ToResponse(null));
    }
}

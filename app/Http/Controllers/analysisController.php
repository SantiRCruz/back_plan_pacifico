<?php

namespace App\Http\Controllers;

use App\Models\Analysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class analysisController extends Controller
{
    public function store(Request $request)
    {
        $validations = Validator::make($request->all(), [
         'user_id'          => 'required',
         'population_id'    => 'required',
         'sample_type_id'   => 'required',
         'water_type_id'    => 'required',
         'date'             => 'required',
         'hour'             => 'required',
         'sample_type'      =>'required'
        ]);

        if(!$validations->fails()){
            $analysis = new Analysis;
            $analysis->user_id          = $request ->user_id;
            $analysis->population_id    = $request ->population_id;
            $analysis->sample_type_id   = $request ->sample_type_id;
            $analysis->water_type_id    = $request ->water_type_id;
            $analysis->date             = $request -> date;
            $analysis->hour             = $request ->hour;
            $analysis->sample_type      = $request ->sample_type;

            $analysis->save();
            $this->estructura_api->setResultado([$analysis]);
            $this->estructura_api->setEstado('SUC-001', 'sucess', 'Analisis Guardado Correctamente');

        }else{
            $this->estructura_api->setEstado('ERR-000', 'error', $validations->errors());
            $this->estructura_api->setResultado(null);
        }
        return response()->json($this->estructura_api->toResponse(null));
    }
    public function show($id_population)
    {
     $population = Population::where('id_population', $id_population)
                ->first();
    if(isset($population)){


    $this->estructura_api->setResultado($population);
    }else{

    $this->estructura_api->setEstado('INF-001', 'INF', 'No se encontro la poblacion');
    $this->estructura_api->setResultado(null);

    }
    return response()->json($this->estructura_api->toResponse(null));
    }
    public function showByIdPopulation($id_population)
    {
     $population = Analysis::where('population_id', $id_population)
                ->first();
    if(isset($population)){
    $this->estructura_api->setResultado([$population]);
    }else{

    $this->estructura_api->setEstado('INF-001', 'INF', 'No se encontro el analisis por poblacion');
    $this->estructura_api->setResultado([]);

    }
    return response()->json($this->estructura_api->toResponse(null));
    }
}

<?php

namespace App\Http\Controllers;


use App\Models\ArchitectureObservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArchitectureObservationControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $architectureObservation = ArchitectureObservation::all();

        if (count($architectureObservation) > 0) {
            $this->estructura_api->setEstado('SUC-001', 'success', 'Observaciones encontradas');
            $this->estructura_api->setResultado($architectureObservation);
        } else {
            $this->estructura_api->setEstado('INF-001', 'INFO', 'No hay Observaciones');
            $this->estructura_api->setResultado($architectureObservation);
        }
        return response()->json($this->estructura_api->ToResponse(null));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validations = Validator::make($request->all(), [
            'architecture_id'       => 'required',
            'username_house'        => 'required',
            'latitude'              => 'required',
            'altitude'              => 'required',
            'type_house'            => 'required',
            'accessibility'         => 'required'
           ]);
   
           if(!$validations->fails()){

               $architectureObservation = new ArchitectureObservation;
   
               $architectureObservation->architecture_id        = $request->architecture_id;
               $architectureObservation->username_house         = $request->username_house;
               $architectureObservation->latitude               = $request->latitude;
               $architectureObservation->altitude               = $request->altitude;
               $architectureObservation->type_house             = $request->type_house;
               $architectureObservation->accessibility          = $request->accessibility;
               $architectureObservation->save();
   
   
               $this->estructura_api->setResultado([$architectureObservation]);
               $this->estructura_api->setEstado('SUC-001', 'sucess', 'Observacion Guardada Correctamente');
   
           }else{
               $this->estructura_api->setEstado('ERR-000', 'error', $validations->errors());
               $this->estructura_api->setResultado(null);
           }
           return response()->json($this->estructura_api->toResponse(null));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_architecture_observation)
    {
        $architectureObservation = ArchitectureObservation::where('id_architecture_observation', $id_architecture_observation)
                       ->first();
           if(isset($architectureObservation)){
       
       
           $this->estructura_api->setResultado($architectureObservation);
           $this->estructura_api->setEstado('SUC-001', 'message', 'Observacion Encontrada Correctamente');
           }else{
       
           $this->estructura_api->setEstado('INF-001', 'INF', 'No se encontro la Observacion');
           $this->estructura_api->setResultado(null);
       
           }
           return response()->json($this->estructura_api->toResponse(null));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_architecture_observation)
    {
        $validations = Validator::make($request->all(), [
            'architecture_id'       => 'required',
            'username_house'        => 'required',
            'latitude'              => 'required',
            'altitude'              => 'required',
            'type_house'            => 'required',
            'accessibility'         => 'required'
           ]);
   
           if(!$validations->fails()){

               $architectureObservation = ArchitectureObservation::find($id_architecture_observation);   
   
               $architectureObservation->architecture_id        = $request->architecture_id;
               $architectureObservation->username_house         = $request->username_house;
               $architectureObservation->latitude               = $request->latitude;
               $architectureObservation->altitude               = $request->altitude;
               $architectureObservation->type_house             = $request->type_house;
               $architectureObservation->accessibility          = $request->accessibility;
               $architectureObservation->save();
   
   
               $this->estructura_api->setResultado([$architectureObservation]);
               $this->estructura_api->setEstado('SUC-001', 'sucess', 'Observacion Actualizada Correctamente');
   
           }else{
               $this->estructura_api->setEstado('ERR-000', 'error', $validations->errors());
               $this->estructura_api->setResultado(null);
           }
           return response()->json($this->estructura_api->toResponse(null));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_architecture_observation)
    {
        $architectureObservation = ArchitectureObservation::find($id_architecture_observation);

            if(isset($architectureObservation)){
                    $architectureObservation->delete();
   
            $this->estructura_api->setEstado('SUC-001', 'sucesss', 'Observacion eliminada Correctamente');
        
            }else{

            $this->estructura_api->setEstado('ERR-000', 'error', 'Observacion no Encontrada');
            $this->estructura_api->setResultado(null);
        }
        return response()->json($this->estructura_api->toResponse(null));
    }
}

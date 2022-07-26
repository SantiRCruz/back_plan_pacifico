<?php

namespace App\Http\Controllers;

use App\Models\Architecture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArchitectureControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $architecture = Architecture::all();
        if (count($architecture) > 0) {
            $this->estructura_api->setEstado('SUC-001', 'success', 'Construcciones encontradas');
            $this->estructura_api->setResultado($architecture);
        } else {
            $this->estructura_api->setEstado('INF-001', 'INFO', 'No hay Construcciones');
            $this->estructura_api->setResultado($architecture);
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
         'population_id'    => 'required',
         'community'        => 'required',
         'survey_number'    => 'required',
         'latitude'         => 'required',
         'altitude'         => 'required'
        ]);

        if(!$validations->fails()){
            $architecture = new Architecture;

            $architecture->population_id    = $request->population_id;
            $architecture->community        = $request->community;
            $architecture->survey_number    = $request->survey_number;
            $architecture->latitude         = $request->latitude;
            $architecture->altitude         = $request->altitude;
            $architecture->save();


            $this->estructura_api->setResultado([$architecture]);
            $this->estructura_api->setEstado('SUC-001', 'sucess', 'Construccion Guardada Correctamente');

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
    public function show($id_architecture)
    {
        {
            $architecture = Architecture::where('id_architecture', $id_architecture)
                       ->first();
           if(isset($architecture)){
       
       
           $this->estructura_api->setResultado($architecture);
           $this->estructura_api->setEstado('SUC-001', 'message', 'Construccion Encontrada Correctamente');
           }else{
       
           $this->estructura_api->setEstado('INF-001', 'INF', 'No se encontro la Construccion');
           $this->estructura_api->setResultado(null);
       
           }
           return response()->json($this->estructura_api->toResponse(null));
        }
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
    public function update(Request $request, $id_architecture)
    {
        $validations = Validator::make($request->all(), [
            'population_id'    => 'required',
            'community'        => 'required',
            'survey_number'    => 'required',
            'latitude'         => 'required',
            'altitude'         => 'required'
           ]);
   
            if (!$validations->fails()) {
                $architecture = Architecture::find($id_architecture);
                if (isset($architecture)) {
     
                $architecture->population_id    = $request->population_id;
                $architecture->community        = $request->community;
                $architecture->survey_number    = $request->survey_number;
                $architecture->latitude         = $request->latitude;
                $architecture->altitude         = $request->altitude;
                 
                $architecture->save();
   
   
               $this->estructura_api->setResultado([$architecture]);
               $this->estructura_api->setEstado('SUC-001', 'sucess', 'Construccion Actualizada Correctamente');
   
           }else{
               $this->estructura_api->setEstado('ERR-000', 'error', $validations->errors());
               $this->estructura_api->setResultado(null);
           }
           return response()->json($this->estructura_api->toResponse(null));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_architecture)
    {
        $architecture = Architecture::find($id_architecture);

            if(isset($architecture)){
                    $architecture->delete();
   
            $this->estructura_api->setEstado('SUC-001', 'sucesss', 'Construccion eliminada Correctamente');
        
            }else{

            $this->estructura_api->setEstado('ERR-000', 'error', 'Construccion no Encontrada');
            $this->estructura_api->setResultado(null);
        }
        return response()->json($this->estructura_api->toResponse(null));
       
    }
}

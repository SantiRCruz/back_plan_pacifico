<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Population;
use Illuminate\Support\Facades\Validator;

class populationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Population::all();
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
         'populated_center_id' => 'required',
         'ethnic_group_id'     => 'required',
         'population_type_id'  =>  'required',
         'length'              => 'required|unique:populations',
         'latitude'            => 'required|unique:populations',
         'altitude'           => 'required|unique:populations',
         'photography'         => 'required',
         'inhabitants_number'  =>'required',
         'surface_sources'     =>'required',
         'underground_sources' => 'required',
         'catchment_type'      =>'required'

        ]);

        if(!$validations->fails()){
            $population = new Population;
            $population->populated_center_id  = $request ->populated_center_id;
            $population->ethnic_group_id      = $request ->ethnic_group_id;
            $population->population_type_id   = $request ->population_type_id;
            $population->length               = $request ->length;
            $population->latitude             = $request ->latitude;
            $population->altitude             = $request -> altitude;
            $population->photography          = $request ->photography;
            $population->inhabitants_number   = $request ->inhabitants_number;
            $population->surface_sources      = $request ->surface_sources;
            $population->underground_sources  = $request ->underground_sources;
            $population->catchment_type       = $request ->catchment_type;

            $population->save();
            $this->estructura_api->setResultado($population);
            $this->estructura_api->setEstado('SUC-001', 'sucess', 'Poblacion Guardada Correctamente');

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
    public function update(Request $request, $id_population)
    {
        $validations = Validator::make($request->all(),[
            'populated_center_id' => 'required',
            'ethnic_group_id'     => 'required',
            'population_type_id'  =>  'required',
            'length'              => 'required|unique:populations',
            'latitude'            => 'required|unique:populations',
            'altitude'           => 'required|unique:populations',
            'photography'         => 'required',
            'inhabitants_number'  =>'required',
            'surface_sources'     =>'required',
            'underground_sources' => 'required',
            'catchment_type'      =>'required'

        ]);
        if (!$validations->fails()) {
           $population = Population::find($id_population);
           if (isset($population)) {

            $population->populated_center_id  = $request ->populated_center_id;
            $population->ethnic_group_id      = $request ->ethnic_group_id;
            $population->population_type_id   = $request ->population_type_id;
            $population->length               = $request ->length;
            $population->latitude             = $request ->latitude;
            $population->altitude             = $request -> altitude;
            $population->photography          = $request ->photography;
            $population->inhabitants_number   = $request ->inhabitants_number;
            $population->surface_sources      = $request ->surface_sources;
            $population->underground_sources  = $request ->underground_sources;
            $population->catchment_type       = $request ->catchment_type;

            $population->save();

               $this->estructura_api->setResultado($population);
               $this->estructura_api->setEstado('SUC-001', 'success', 'Poblacion Actualizado correctamente');
           } else {
               $this->estructura_api->setEstado('ERR-000', 'error', 'no existe esta Poblacion');
           }
       } else {
           $this->estructura_api->setEstado('ERR-000', 'error', $validations->errors());
       }
       return response()->json($this->estructura_api->toResponse(null));

       }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_population)
    {
     $population = Population::find($id_population);

     if(isset($population)){
         $population->delete();

    $this->estructura_api->setResultado($population);
    $this->estructura_api->setEstado('SUC-001', 'sucesss', 'Poblacion eliminada Correctamente');
     }else{
    $this->estructura_api->setEstado('ERR-000', 'error', 'Poblacion no Encontrada');
    $this->estructura_api->setResultado(null);
     }
     return response()->json($this->estructura_api->toResponse(null));
    }
}

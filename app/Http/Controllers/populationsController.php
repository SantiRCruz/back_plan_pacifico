<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Population;
use App\Models\population_ethnic;
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
        $population = Population::join('populated_centers','populated_center_id','id_populated_center')
        /* ->join('ethnic_groups','ethnic_group_id','id_ethnic_group') */
        ->join('municipalities','municipality_id','id_municipality')
        ->join('departments','department_id','id_department')
        ->get();
        if (count($population) > 0) {
            $this->estructura_api->setEstado('SUC-001', 'success', 'Poblaciones encontradas');
            $this->estructura_api->setResultado($population);
        } else {
            $this->estructura_api->setEstado('INF-001', 'INFO', 'No hay poblaciones');
            $this->estructura_api->setResultado($population);
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
         'populated_center_id' => 'required|unique:populations',
         'ethnic_groups'     => 'required|array',
         'length'              => 'required',
         'latitude'            => 'required',
         'altitude'            => 'required',
         'photography'         => 'required',
         'inhabitants_number'  => 'required'
        ]);


        if(!$validations->fails()){
            $populationSaved = new Population;
            $populationSaved->populated_center_id  = $request ->populated_center_id;
            $populationSaved->length               = $request ->length;
            $populationSaved->latitude             = $request ->latitude;
            $populationSaved->altitude             = $request -> altitude;
            $populationSaved->photography          = $request ->photography;
            $populationSaved->inhabitants_number   = $request ->inhabitants_number;
       
         

            $populationSaved->save();

           
            for($i=0;$i<sizeof($request->ethnic_groups);$i++){
                $population_ethnic = new population_ethnic;
                $population_ethnic->populations_id   =$populationSaved ->id_population;
                $population_ethnic->ethnic_group_id =$request->ethnic_groups[$i];
                $population_ethnic->save();
            }
         

            $population = Population::join('populated_centers','populated_center_id','id_populated_center')
            ->join('municipalities','municipality_id','id_municipality')
            ->join('departments','department_id','id_department')
            ->where('id_population', $populationSaved->id_population)
            ->get();
            $this->estructura_api->setResultado($population);
            $this->estructura_api->setEstado('SUC-001', 'sucess', 'Poblacion Guardada Correctamente');

        }else{
            $this->estructura_api->setEstado('ERR-000', 'error', "Error al registrar por validaciones");
            $this->estructura_api->setResultado([]);
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
            'ethnic_groups'     => 'required|array',
            'length'              => 'required',
            'latitude'            => 'required',
            'altitude'           => 'required',
            'photography'         => 'required',
            'inhabitants_number'  =>'required'

        ]);
        if (!$validations->fails()) {
           $population = Population::find($id_population);
           if (isset($population)) {

            $population->populated_center_id  = $request ->populated_center_id;
            // $population->ethnic_groups      = $request ->ethnic_groups;
            $population->length               = $request ->length;
            $population->latitude             = $request ->latitude;
            $population->altitude             = $request -> altitude;
            $population->photography          = $request ->photography;
            $population->inhabitants_number   = $request ->inhabitants_number;
            

            $population->save();
            $population_ethnic = population_ethnic::where('populations_id', $id_population)
            ->get();

            for($i=0;$i<sizeof($population_ethnic);$i++){
            $population = population_ethnic::find($population_ethnic[$i]->id_population_ethnics);
            $population->delete();
            }

            for($i=0;$i<sizeof($request->ethnic_groups);$i++){
                $population_ethnic = new population_ethnic;
                $population_ethnic->populations_id   =$id_population;
                $population_ethnic->ethnic_group_id =$request->ethnic_groups[$i];
                $population_ethnic->save();
            }

               $this->estructura_api->setResultado([$population]);
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

    $this->estructura_api->setEstado('SUC-001', 'sucesss', 'Poblacion eliminada Correctamente');
     }else{
    $this->estructura_api->setEstado('ERR-000', 'error', 'Poblacion no Encontrada');
    $this->estructura_api->setResultado(null);
     }
     return response()->json($this->estructura_api->toResponse(null));
    }
}

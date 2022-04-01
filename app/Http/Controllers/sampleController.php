<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Sample;
use App\Models\Measure;


class sampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_analysis)
    {
        $sample = Sample::join('parameters','parameter_id','id_parameter')
        ->where('analysis_id',$id_analysis)
        ->with('Measure')
        ->get()
        ->makeHidden(['created_at','updated_at']);
    
        if(isset($sample)){
            $this->estructura_api->setResultado($sample);
           }else{
              $this->estructura_api->setEstado('INF-001', 'INF', 'No se han encontrado muestras realizadas');
              $this->estructura_api->setResultado(null);
           }
      
           return response()->json($this->estructura_api->toResponse(null));
    
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
    // public function store(Request $request)
    // {
    //   $validation = Validator::make($request->all(),[
    //   'parameter_id' => 'required',
    //   'analysis_id' =>  'required',
    //   'average'    =>   'required',
    //   ]);
    //   if(!$validation->fails()){
    //       $sample = new Sample;
    //       $sample->parameter_id     = $request->parameter_id;
    //       $sample->analysis_id      = $request->analysis_id;
    //       $sample->average          = $request->average;

    //       $sample->save();
    //       $this->estructura_api->setResultado($sample);
    //       $this->estructura_api->setEstado('SUC-001', 'sucesss', 'Muestra Registrada Correctamente');
    //   }else{
    //       $this->estructura_api->setEstado("ERR-00", 'error', $validation->errors());
    //       $this->estructura_api->setResultado(null);
    //   }
    //   return response()->json($this->estructura_api->toResponse(null));
    // }

 // desde este store se puede mejorar el almacenamiento del  promedio por medio de un trigger en la DB
 public function store(Request $request)
 {
   $validation = Validator::make($request->all(),[
   'parameter_id'   => 'required',
   'analysis_id'    =>  'required',
   'average'        =>   'required',
   'value'          =>   'required',
   'register_date'  =>   'required',
   ]);
   if(!$validation->fails()){
    $sample = Sample::where('analysis_id',$request->analysis_id)
    ->where('parameter_id',$request->parameter_id)
    ->get();
     if (count($sample) > 0) {
        if ($sample[0]->parameter_id == 2 ) {
            $this->estructura_api->setEstado("ERR-00", 'error', "El parametro solo se puede registrar una vez");
            $this->estructura_api->setResultado([]);
        }else{
            $measure = new Measure;
            $measure->sample_id  = $sample[0]->id_sample;
            $measure->value  = $request->value;
            $measure->register_date  = $request->register_date;
            $measure->save();
        
            $allMeasures = Measure::where('sample_id',$sample[0]->id_sample)
            ->get();
    
            $measureAvg = $allMeasures->avg('value');
    
    
            $sample[0]->average  = $measureAvg;
        
            $sample[0]->save();
    
            $this->estructura_api->setResultado($sample);
            $this->estructura_api->setEstado('SUC-001', 'sucess', 'Medida Registrada y Muestra Actualizada Correctamente');
        }
    }
    else{
        $newSample = new Sample;
        $newSample->parameter_id     = $request->parameter_id;
        $newSample->analysis_id      = $request->analysis_id;
        $newSample->average      = $request->average;

        $newSample->save(); 

        $measure = new Measure;
        $measure->sample_id  = $newSample->id_sample;
        $measure->value  = $request->value;
        $measure->register_date  = $request->register_date;
        $measure->save();

        $this->estructura_api->setResultado([$newSample]);
        $this->estructura_api->setEstado('SUC-001', 'sucess', 'Muestra y Medida Registrada Correctamente');
    }
   }else{
          $this->estructura_api->setEstado("ERR-00", 'error', $validation->errors());
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
    public function show($id_sample)
    {
     $sample = Sample::where('id_sample', $id_sample)
            ->first();

     if(isset($sample)){
         $this->estructura_api->setResultado($sample);

     }else{
        $this->estructura_api->setEstado('INF-001', 'INFO','No se encontro Ninguna Muestra');
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_sample)
    {
     $validation = Validator::make($request->all(),[
        'parameter_id' => 'required',
        'analysis_id' =>  'required',
        'average'    =>   'required',
     ]);
     if(!$validation->fails()){

        $sample = Sample::find($id_sample);

     if(isset($sample)){

        $sample->parameter_id   = $request->parameter_id;
        $sample->analysis_id    = $request->analysis_id;
        $sample->average        = $request->average;

        $sample->save();


    $this->estructura_api->setResultado($sample);
    $this->estructura_api->setEstado('SUC-001', 'sucess', 'Muestra Actualizada Correctamente');

     }else{
         $this->estructura_api->setEstado('ERR-000', 'error', 'Muestra no Encontrada');
     }
     }else{
     $this->estructura_api->setEstado('ERR-000', 'error', $validation->error());
     }
     return response()->json($this->estructura_api->toResponse(null));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_sample)
    {
    $sample = Sample::find($id_sample);
    if(isset($sample)){

      $sample->delete();

      $this->estructura_api->setResultado($sample);
      $this->estructura_api->setEstado('SUC-001', 'sucess', 'Muestra Eliminada Correctamente');
    }else{
     $this->estructura_api->setEstado('ERR-001', 'error', 'No se encontro esta muestra');
     $this->estructura_api->setResultado(null);
    }

    return response()->json($this->estructura_api->toResponse(null));
    }
}

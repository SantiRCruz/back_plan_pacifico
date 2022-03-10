<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Sample;

class sampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return Sample::all();
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
      $validation = Validator::make($request->all(),[

      ]);
      if(!$validation->fails()){
          $sample = new Sample;
          $sample->parameter_id     = $request->parameter_id;
          $sample->analysis_id      = $request->analysis_id;
          $sample->average          = $request->average;

          $sample->save();
          $this->estructura_api->setResultado($sample);
          $this->estructura_api->setEstado('SUC-001', 'sucesss', 'Muestra Registrada Correctamente');
      }else{
          $this->estructura_api->setEstado("ERR-00", 'error', $validation->error());
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

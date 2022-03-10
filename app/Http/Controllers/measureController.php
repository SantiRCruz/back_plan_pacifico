<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Measure;
use Illuminate\Support\Facades\Validator;

class measureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return measure::all();
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
        $validations = Validator::make($request->all(),[
          'sample_id'  => 'required',
          'value'     => 'required',
          'register_date' => 'required'
        ]);
     if(!$validations->fails()){

         $measure = new Measure;
         $measure->sample_id = $request->sample_id;
         $measure->value     = $request->value;
         $measure->register_date = $request->register_date;

         $measure->save();

        $this->estructura_api->setResultado($measure);
        $this->estructura_api->setEstado('SUC-001', 'sucess', 'Medida Registrada Correctamente');

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
    public function show($id_measure)
    {
     $measure = Measure::where('id_measure', $id_measure)
                    ->first();

     if(isset($measure)){
      $this->estructura_api->setResultado($measure);

     }else{
        $this->estructura_api->setEstado('INF-001', 'INF', 'No se encontro la medida');
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
    public function update(Request $request, $id_measure)
    {
     $validation = Validator::make($request->all(),[
        'sample_id'  => 'required',
        'value'     => 'required',
        'register_date' => 'required'
     ]);
     if(!$validation->fails()){
    $measure = Measure::find($id_measure);

    if(isset($measure)){
    $measure->sample_id = $request->sample_id;
    $measure->value     = $request->value;
    $measure->register_date = $request->register_date;

    $measure->save();

    $this->estructura_api->setResultado($measure);
    $this->estructura_api->setEstado('SUC-001', 'sucess', 'Actualizacion Realizada Correctamente');
         }else{
    $this->estructura_api->setEstado('ERR-000', 'error', 'No se encontro la medida');
         }
     }else{
     $this->estructura_api->setEstado('ERR-000', 'error', $validation->error());
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
    public function destroy($id_measure)
    {
     $measure = Measure::find($id_measure);
     if(isset($measure)){
    $measure->delete();
     $this->estructura_api->setEstado('SUC-001', 'sucess', 'Medida Eliminada Correctamente');
     }else{
        $this->estructura_api->setEstado('INF-001', 'INF', 'No se encontro esta medida' );
        $this->estructura_api->setResultado(null);
     }

     return response()->json($this->estructura_api->toResponse(null));
    }
}

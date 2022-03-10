<?php

namespace App\Http\Controllers;

use App\Models\SampleType;
use Illuminate\Http\Request;

class sampleTypesController extends Controller
{
    //
    public function index()
    {
        $sample_type = SampleType::get();
        $this->estructura_api->setResultado($sample_type);
        return response()->json($this->estructura_api->toResponse(null));
    }
}

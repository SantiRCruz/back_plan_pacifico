<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class featuresController extends Controller
{
    public function index()
    {
        $feature = Feature::get();
        $this->estructura_api->setResultado($feature);
        return response()->json($this->estructura_api->toResponse(null));
    }
}

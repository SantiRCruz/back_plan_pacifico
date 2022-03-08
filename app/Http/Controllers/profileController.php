<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class profileController extends Controller
{
    //
    public function index()
    {
        $profile = Profile::get();
        $this->estructura_api->setResultado($profile);
        return response()->json($this->estructura_api->toResponse(null));
    }
}

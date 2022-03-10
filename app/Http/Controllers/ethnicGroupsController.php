<?php

namespace App\Http\Controllers;

use App\Models\EthnicGroup;
use Illuminate\Http\Request;

class ethnicGroupsController extends Controller
{
    //
    public function index()
    {
        $ethnic_group = EthnicGroup::get();
        $this->estructura_api->setResultado($ethnic_group);
        return response()->json($this->estructura_api->toResponse(null));
    }
}

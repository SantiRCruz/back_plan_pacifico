<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class departmentsController extends Controller
{
    public function index()
    {
        $departament = Department::get();
        $this->estructura_api->setResultado($departament);
        return response()->json($this->estructura_api->toResponse(null));
    }
}

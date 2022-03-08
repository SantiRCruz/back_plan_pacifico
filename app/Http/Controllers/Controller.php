<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Responsables\AutenticacionUsuario;
use App\Responsables\EstructuraApi;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public $estructura_api;
    public $autenticacion_usuario;

    public function __construct()
    {
        $this->estructura_api           = new EstructuraApi();
        $this->autenticacion_usuario    = new AutenticacionUsuario();
     
    }
}

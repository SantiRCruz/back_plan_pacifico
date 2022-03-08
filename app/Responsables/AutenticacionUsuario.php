<?php

namespace App\Responsables;

use App\CodigoApi;
use Illuminate\Contracts\Support\Responsable;

class AutenticacionUsuario
{
    private $id_usuario = null;

    /* Pasar a base de datos */
    public function __construct()
    {
        //
    }

    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function validarIdUsuario()
    {
        $estructura_api = new EstructuraApi();
        if ($this->id_usuario == null) {
            $estructura_api->setEstado('ERR-000', 'error', 'No tiene permiso para realizar la Peticion');
            return response()->json(
                $estructura_api->toResponse(null)
            );
        } else {
            return (int) $this->id_usuario;
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use stdClass;

class sigInController extends Controller
{
    public function sesion(Request $request)
    {
        $validations = Validator::make($request->all(), [
            'user_nick' => 'required',
            'password' => 'required'
        ]);

        if (!$validations->fails()) {
            $user = User::where('user_nick', $request->user_nick)
                ->where('password', md5($request->password))
                ->first();

            if (isset($user)) {
                $data_user = new stdClass;
                $data_user->user = $user;
                // $data_user->profile = $user->profile;
                $this->estructura_api->setResultado($data_user);
            } else {
                // 
                $this->estructura_api->setEstado('ERR-000', 'error', 'Usuario o contraseña incorrectos');
            }
        } else {
            $this->estructura_api->setEstado('ERR-000', 'error', $validations->errors());
        }
        return response()->json($this->estructura_api->toResponse(null));
    }
}

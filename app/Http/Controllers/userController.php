<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use stdClass;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::select("id_user", "usernames", "user_last_names", "user_nick", "phone_number", "identification", "email", "profiles.name_profile", "profile_id")
            ->join("profiles", "profile_id", "id_profile")->get();

        if (count($user) > 0) {
            $this->estructura_api->setEstado('SUC-001', 'success', 'Usuario registrado correctamentrre');
            $this->estructura_api->setResultado($user);
        } else {
            $this->estructura_api->setEstado('ERR-000', 'error', 'No existen usuarios registrados');
        }
        return response()->json($this->estructura_api->toResponse(null));
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
        $validations = Validator::make($request->all(), [
            'usernames'           => 'required',
            'user_last_names'     => 'required',
            'identification'      => 'required|unique:users',
            'phone_number'        => 'required',
            'email'               => 'required|unique:users',
            'password'            => 'required',
            'profile_id'          => 'required',
            'user_nick'           => 'required|unique:users'
        ]);

        if (!$validations->fails()) {
            $user = new User();
            $user->usernames          =      $request->usernames;
            $user->user_last_names    =      $request->user_last_names;
            $user->identification     =      $request->identification;
            $user->phone_number       =      $request->phone_number;
            $user->email              =      $request->email;
            $user->password           =      md5($request->password);
            $user->profile_id         =      $request->profile_id;
            $user->user_nick          =      $request->user_nick;

            $user->save();

            $this->estructura_api->setEstado('SUC-001', 'success', 'Usuario registrado correctamente');
            $this->estructura_api->setResultado($user);
        } else {
            $this->estructura_api->setEstado("ERR-00", 'error', $validations->errors());
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
    public function show($id_user)
    {
        $user = User::where('id_user', $id_user)
            ->first();
        if (isset($user)) {
            $this->estructura_api->setResultado($user);
        } else {
            $this->estructura_api->setEstado('ERR-000', 'error', 'Usuario no Encontrado');
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
    public function update(Request $request, $id_user)
    {
        $validations = Validator::make($request->all(), [
            'usernames'           => 'required',
            'user_last_names'     => 'required',
            'identification'      => 'required',
            'phone_number'        => 'required',
            'email'               => 'required',
            'password'            => 'required',
            'profile_id'          => 'required',
            'user_nick'           => 'required'
        ]);
        if (!$validations->fails()) {
            $user_modified = User::find($id_user);
            if (isset($user_modified)) {
                $user_modified->usernames            =          $request->usernames;
                $user_modified->user_last_names      =          $request->user_last_names;
                $user_modified->identification       =          $request->identification;
                $user_modified->phone_number         =          $request->phone_number;
                $user_modified->email                =          $request->email;
                $user_modified->password             =          $request->password;
                $user_modified->profile_id           =          $request->profile_id;
                $user_modified->user_nick            =          $request->user_nick;

                $user_modified->save();
                $this->estructura_api->setResultado($user_modified);
                $this->estructura_api->setEstado('SUC-001', 'success', 'Usuario modificado correctamente');
            } else {
                $this->estructura_api->setEstado('ERR-001', 'error', 'Usuario no encontrado');
                $this->estructura_api->setResultado(null);
            }
        } else {
            $this->estructura_api->setEstado('ERR-000', 'error', $validations->errors());
        }
        return response()->json($this->estructura_api->toResponse(null));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_user)
    {
        $user = User::find($id_user);
        if (isset($user)) {
            $user->delete();
            $this->estructura_api->setResultado($user);
            $this->estructura_api->setEstado('SUC-001', 'sucess', 'Usuario eliminado correctamente');
        } else {
            $this->estructura_api->setEstado('ERR-000', 'error', 'Usuario no encontrado');
        }
        return response()->json($this->estructura_api->toResponse(null));
    }
}

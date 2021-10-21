<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveEmpleadoRequest;
use App\Http\Requests\SaveUserRequest;
use App\Models\Empleado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {

        $usuarios = User::get();
        
        return view('admin.usuario.index', ["usuarios" => $usuarios]);
    }

    public function create()
    {
        return view('admin.usuario.create', ['usuario' => new User()]);
    }

    public function store(SaveUserRequest $request)
    {

        $fields = $request->validated();

        try {
            $empleado = Empleado::where('doc', $fields['empleado_id'])
                ->orWhere('id', $fields['empleado_id'])
                ->firstOrFail();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {

            return redirect()->route('user.create')
                ->with('message', 'No se encontro el empleado con ese numero de DUI')
                ->with('status', 'warning');
        }

        $fields['password'] = Hash::make($fields['empleado_id']);

        $fields['empleado_id'] = $empleado->id;

        $user = User::create($fields);

        return redirect()->route('user')
            ->with('message', 'Usuario creado.')
            ->with('status', 'success');
    }

    public function edit($id)
    {
        try {
            $usuario = User::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {

            return redirect()->route('user')
                ->with('message', 'Peticion no puede ser procesada usuario no existe [UE001]')
                ->with('status', 'warning');
        }
        return view('admin.usuario.edit', ['usuario' => $usuario]);
    }

    public function update(SaveUserRequest $request,$id)
    {
        $fields = $request->validated();
       
        try {
            $usuario = User::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {

            return redirect()->route('user')
                ->with('message', 'Peticion no puede ser procesada usuario no existe [UE004]')
                ->with('status', 'warning');
        }
        $usuario->update($fields);

        return redirect()->route('user')
            ->with('message', 'Usuario editado.')
            ->with('status', 'success');
    }

    public function destroy($id)
    {

        try {
            User::findOrFail($id)->delete();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {

            return redirect()->route('user')
                ->with('message', 'Peticion no puede ser procesada usuario no existe [UE003]')
                ->with('status', 'warning');
        }
        
        return redirect()->route('user')
            ->with('message', 'Usuario eliminado.')
            ->with('status', 'success');
    }
    // try {
            
    //     $empleado = Empleado::findOrFail($usuario->empleado_id);
    
    // } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
    //     $empleado = new Empleado();
    // }

}

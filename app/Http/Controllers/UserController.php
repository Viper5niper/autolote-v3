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
}

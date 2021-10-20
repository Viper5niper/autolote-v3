<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveEmpleadoRequest;
use App\Http\Requests\SaveUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {   

        $usuarios = User::get();
        $heads = [
            'id',
            'name',
            'email',
            'role',
            'actions',
        ];

        $items = $usuarios->map->only($heads);

        $config = [
            'data' => $items,
            'order' => [[1, 'asc']],
            'columns' => [null, null, null, ['orderable' => false]],
        ];

        return view('admin.usuario.index', ["config" => $config, "heads" => $heads]);
    }

    public function create(){
        return view('admin.usuario.create',['usuario'=>new User()]);
    }

    public function store(SaveUserRequest $request){

        $fields = $request->validated();
        //$fields = toUppercase($fields);

        $fields['password'] = Hash::make($fields['password']);

        //return $fields;
        
        $user = User::create($fields);

        return redirect()->route('user')
            ->with('message', 'Usuario creado.')
            ->with('status', 'success');
    }
}

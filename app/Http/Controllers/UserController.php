<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}

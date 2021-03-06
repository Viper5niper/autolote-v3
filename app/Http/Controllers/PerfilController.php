<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveEmpleadoRequest;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    public function index(){
        
        $usuario = Auth::user();
        
        $message='';
        $status='';

        if(empty($usuario->empleado->id)){
            $message='Este usuario no dispone de un empleado asociado';
            $status='warning';
        }

        return view('admin.usuario.perfil',['usuario'=>$usuario, 'message' => $message, 'status'=> $status ]);
    }

    public function edit($id){
        
        $usuario = Auth::user();
        
        return view('admin.usuario.perfil_edit',['usuario'=>$usuario]);
    }

    public function update(SaveEmpleadoRequest $request, $id)
    {
        $fields = $request->validated();
        $fields = toUppercase($fields);

        $empleado = Empleado::find($id);

        $empleado->update($fields);

        $files = $request->file('images');

        if($files) {
            foreach ($files as $file) {
                upload_global($file, $empleado->path);
            }
        }
        
        return redirect()->route('empleado')
            ->with('message', 'Usuario editado.')
            ->with('status', 'success');
    }

    public function changePwd(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Su contraseña actual no coincide con la contraseña que proporcionó. Inténtalo de nuevo.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","La nueva contraseña no puede ser la misma que su contraseña actual. Elija una contraseña diferente.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Contraseña cambiada con éxito !");
    }
}

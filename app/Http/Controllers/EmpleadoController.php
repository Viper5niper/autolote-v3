<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveEmpleadoRequest;
use App\Models\Empleado;
use App\Models\User;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::paginate(16);
        return view("admin.empleado.index", compact('empleados'));
    }

    public function create()
    {
        return view("admin.empleado.create",['empleado'=>new Empleado()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveEmpleadoRequest $request)
    {
        $fields = $request->validated();
        $fields = toUppercase($fields);
    
        $empleado = Empleado::create($fields);

        $files = $request->file('images');

        foreach ($files as $file) {
            upload_global($file, $empleado->path);
        }

        return redirect()->route('empleado')
            ->with('message', 'Empleado creado.')
            ->with('status', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function buscaremp(Request $request)
    {
        $criterio = $request->request->get('criterio');

        try{
            $empleado = Empleado::where('doc',$criterio)
                        ->orWhere('id',$criterio)
                        ->firstOrFail();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            
            return redirect()->route('user.create')
            ->with('message','No se encontro el criterio de busqueda')
            ->with('status','warning');
        }

        return view('admin.usuario.create',['usuario'=>new User(),'empleado'=>$empleado])->with('message',$criterio.' encontrado!')
        ->with('status','success');
      
        // return redirect()->route('user.create',array($empleado))
        // ->with('message',$criterio.' encontrado!')
        // ->with('status','success');
    }
}

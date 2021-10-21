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
        if($files){
            foreach ($files as $file) {
                upload_global($file, $empleado->path);
            }
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
        return view("admin.empleado.show",['empleado'=> Empleado::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("admin.empleado.edit",['empleado'=> Empleado::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveEmpleadoRequest $request, $id)
    {
        $fields = $request->validated();
        $fields = toUppercase($fields);

        $vehiculo = Empleado::find($id);

        $vehiculo->update($fields);

        $files = $request->file('images');

        if($files) {
            foreach ($files as $file) {
                upload_global($file, $vehiculo->path);
            }
        }
        
        return redirect()->route('vehiculo')
            ->with('message', 'Vehiculo editado.')
            ->with('status', 'success');
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

    
}

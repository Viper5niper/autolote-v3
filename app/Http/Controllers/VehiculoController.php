<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveVehiculoRequest;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos = Vehiculo::paginate(6);
        return view("/admin/vehiculo/index",compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("/admin/vehiculo/create",['vehiculo'=>new Vehiculo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveVehiculoRequest $request)
    {
    
        $fields = $request->validated();
        $fields = VehiculoController::toUppercase($fields);
        $fields['estado'] = 'D';
    
        Vehiculo::create($fields);
        
        return redirect()->route('vehiculo')
        ->with('message','Vehiculo creado.')
        ->with('status','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        return view('/admin/vehiculo/show',['vehiculo'=>Vehiculo::findOrFail($id)]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehiculo $vehiculo)
    {
        return view('/admin/vehiculo/edit',['vehiculo'=>$vehiculo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(SaveVehiculoRequest $request, $id)
    {
        $fields = $request->validated();
        $fields = VehiculoController::toUppercase($fields);

        Vehiculo::where('id',$id)->update($fields);

        // return redirect()->route('vehiculo.show',$id)->with('mensaje','Se edito el vehiculo');
        return redirect()->route('vehiculo')
        ->with('message','Vehiculo editado.')
        ->with('status','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vehiculo::findOrFail($id)->delete();
        return redirect()->route('vehiculo')
        ->with('message','Vehiculo eliminado.')
        ->with('status','success');
    }

    public static function toUppercase($fields){
        
        foreach($fields as $key => $field){
            $fields[$key] = mb_strtoupper($field, 'UTF-8');
        }

        return $fields;
    }
}

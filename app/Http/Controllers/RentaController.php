<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Renta;
use App\Models\Vehiculo;
use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;

class RentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $renta = Renta::paginate(16);
        return view('/admin/renta/index', compact('renta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($vehiculo_id = 0,$cliente_id = 0)
    {
        $cliente = $cliente_id == 0 ? new Cliente : Cliente::findOrFail($cliente_id);
        $vehiculo = $vehiculo_id == 0 ? new Vehiculo : Vehiculo::findOrFail($vehiculo_id);
        
        return view('/admin/renta/create',['vehiculo'=>$vehiculo,'cliente'=>$cliente]);
    }

    public function create_renta(){

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}

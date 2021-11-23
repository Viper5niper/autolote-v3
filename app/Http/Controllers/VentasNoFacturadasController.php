<?php

namespace App\Http\Controllers;

use App\Models\Ventas_no_Facturadas;
use Illuminate\Http\Request;

class VentasNoFacturadasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Ventas_no_Facturadas::paginate(10);
        return view('common.ventas_no_facturadas.index',compact('ventas'));
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
        $json_array = [];
        $json_array['nombre'] = $request['nombre'];
        $json_array['apellido'] = $request['apellido'];
        $json_array['doc'] = $request['doc'];
        $json_array['placa'] = $request['placa'];
        $json_array['servicios'] = json_decode($request['servicios']);

        $ventas = Ventas_no_Facturadas::create(['json_array' => $json_array]);
        
        return redirect()->route('dashboard')
        ->with('message', 'Venta Registrada con exito')
        ->with('status', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ventas_no_Facturadas  $ventas_no_Facturadas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta = Ventas_no_Facturadas::findOrFail($id);
        return view('common.ventas_no_facturadas.show',compact('venta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ventas_no_Facturadas  $ventas_no_Facturadas
     * @return \Illuminate\Http\Response
     */
    public function edit(Ventas_no_Facturadas $ventas_no_Facturadas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ventas_no_Facturadas  $ventas_no_Facturadas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ventas_no_Facturadas $ventas_no_Facturadas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ventas_no_Facturadas  $ventas_no_Facturadas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ventas_no_Facturadas $ventas_no_Facturadas)
    {
        //
    }
}

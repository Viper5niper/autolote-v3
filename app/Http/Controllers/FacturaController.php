<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        return view("/admin/factura/index",compact('vehiculo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        $factura = Factura::findOrFail($id);
        return view('/common/factura/show', compact('factura'));
    }

    public function show_print_invoice($id)
    {
        $factura = Factura::findOrFail($id);
        $fecha = preg_split("/[\s-]/", $factura->created_at);
        $factura['anio'] = $fecha[0];
        $factura['mes']  = $fecha[1];
        $factura['dia']  = $fecha[2];
       
        if($factura->area_factura === 'R'){
            if($factura->tipo == 'consumidor') {
                return view('/common/factura/impresion/FacturaRenta', compact('factura'));
            }else{
                return view('/common/factura/impresion/FacturaCreditoRenta', compact('factura'));
            }
        }else if($factura->area_factura === 'V'){
            if($factura->tipo == 'consumidor') {
                return view('/common/factura/impresion/FacturaVehiculo', compact('factura'));
            }else{
                return view('/common/factura/impresion/FacturaCreditoVehiculo', compact('factura'));
            }
        }else if($factura->area_factura === 'LC'){
            if($factura->tipo == 'consumidor') {
                return view('/common/factura/impresion/FacturaCouta', compact('factura'));
            }else{
                return view('/common/factura/impresion/FacturaCreditoCouta', compact('factura'));
            }
        }
        
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

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
        //
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
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ventas_no_Facturadas  $ventas_no_Facturadas
     * @return \Illuminate\Http\Response
     */
    public function show(Ventas_no_Facturadas $ventas_no_Facturadas)
    {
        //
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

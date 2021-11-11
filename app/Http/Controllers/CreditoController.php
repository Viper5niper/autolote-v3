<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Credito;
use App\Models\Factura;
use App\Models\Vehiculo;
use Exception;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class CreditoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    public function credito_pay($param = 0)
    {

        try {
            if ($param != 0) {
                $credito = Credito::findOrFail($param);

                $info['cliente'] = $credito->cliente;
                unset($credito->cliente);
                $info['credito'] = $credito;

                // return $info;

            } else {
                $info = [];
                $info['cliente'] = new Cliente;
                $info['credito'] = new Credito;

                // return $info;
            }

            return view('common.credito.pay', compact('info'));
        } catch (Exception $ex) {
            return redirect()->route('credito.pay', compact('info'))
                ->with('message', 'No se encontro el credito')
                ->with('status', 'warning');
        }
    }

    public function buscar_credito(Request $request)
    {

        try {

            $info = [];
            $result = preg_match('/^\d{8}-\d{1}$/', $request->param);

            if ($result == 0) {
                $credito = Credito::where('id', $request->param)
                    ->orWhere('cliente_id', $request->param)->firstOrFail();

                $info['cliente'] = $credito->cliente;
                unset($credito->cliente);
                $info['credito'] = $credito;
            } else {
                $cliente = Cliente::where('doc', $request->param)->firstOrFail();
                $info['credito'] = $cliente->creditos;
                unset($cliente->creditos);
                $info['cliente'] = $cliente;
                // return $info;
            }


            return view('common.credito.pay', compact('info'));
        } catch (Exception $ex) {

            $info = [];
            $info['cliente'] = new Cliente;
            $info['credito'] = new Credito;

            return redirect()->route('credito.pay', compact('info'))
                ->with('message', 'No se encontro el criterio de busqueda')
                ->with('status', 'warning');
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
        //try {
        $factura = "";
        $credito = Credito::findOrFail($id);
        $json_array = $credito['json_array'];

        $payload = [
            "Cliente" => $credito->cliente->setAppends([]),
            "n_factura" => $request->n_factura,
            "tipo" => $request->tipo,
            "area_factura" => "LC",
            "descripcion" => $request->descripcion,
            "monto" => $request->monto,
            "fecha" => $request->fecha,
            "ncr" => $request->ncr,
            "saldo_anterior" => $json_array['saldo'],
            "saldo_actual" => $request->saldo,
            "saldo_abonado" => $request->abonado,
            "interes" => $request->interes,
            "dias_mora" => $request->mora,
            "mora" => $request->dias_mora,
            "dias_facturados" => $request->dias,
            "total" => "",
            "monto_credito" => $credito->monto,
            "n_credito" => $credito->id,
        ];

        // $factura = Factura::create([
        //     'n_factura' => $request->n_factura,
        //     'cliente_id' => (int) $credito->cliente_id,
        //     'credito_id' => (int) $credito->id,
        //     'vehiculo_id' => (int) $credito->vehiculo_id,
        //     'tipo' => $request->tipo,
        //     'area_factura' => "LC",
        //     'descripcion' => "Pago de cuota",
        //     'payload' => $payload, //*Informacion necesaria que para poder generar una factura en el archivo o controaldor
        // ]);

        unset($request['_token']);
        unset($request['_method']);

        $all = $request->all();
        $all['factura_id'] =  $factura;

        $json_array['historial_pagos'][] = $all;

        return $payload;

        //}catch (Exception $ex) {

        //    }
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
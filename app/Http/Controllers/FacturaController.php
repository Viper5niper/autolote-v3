<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Cliente;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturas = Factura::paginate(16);

        $info = array();

        foreach ($facturas as $index => $factura) {

            $btnAccion = "<a href='".route('factura.show',$factura->id)."' class='btn btn-info'>Ver detalles</a>";

            $info[$index][] = $factura->n_factura;
            $info[$index][] = $factura->payload['Cliente']['nombre'] . " " . $factura->payload['Cliente']['apellido'];
            $info[$index][] = $factura->tipo;

            switch ($factura->area_factura) {
                case 'V':
                    $info[$index][] = "Ventas";
                    if ($factura->credito_id != null) {
                        $info[$index][] = "Venta a Credito";
                    } else {
                        $info[$index][] = "Venta de Contado";
                    }
                    break;
                case 'LC':
                    $info[$index][] = "Creditos";
                    $info[$index][] = "Pago de Cuota";
                    break;
                case 'R':
                    $info[$index][] = "Rentas";
                    $info[$index][] = "Rentas";
                    break;
                case 'STA':
                    $info[$index][] = "Taller Automotriz";
                    $info[$index][] = "Servicio de Taller";
                    break;
                case 'STP':
                    $info[$index][] = "Taller de Pintura";
                    $info[$index][] = "Servicio de Pintura";
                    break;
                case 'SC':
                    $info[$index][] = "CarWash";
                    $info[$index][] = "**-**";
                    break;
                case 'O':
                    $info[$index][] = "Otros";
                    $info[$index][] = "Multiples Servicios";
                    break;
                default:
                    $info[$index][] = "**--**";
                    $info[$index][] = "**--**";
            }

            $info[$index][] = "$" . $factura->payload['monto'];
            $info[$index][] = $factura->created_at;
            $info[$index][] = '<nobr>' . $btnAccion . '</nobr>';
        }

        return view("/admin/factura/index", compact('info'));
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

        if ($factura->area_factura === 'R') {
            if ($factura->tipo == 'consumidor') {
                return view('/common/factura/impresion/FacturaRenta', compact('factura'));
            } else {
                return view('/common/factura/impresion/FacturaCreditoRenta', compact('factura'));
            }
        } else if ($factura->area_factura === 'V') {
            if ($factura->tipo == 'consumidor') {
                return view('/common/factura/impresion/FacturaVehiculo', compact('factura'));
            } else {
                return view('/common/factura/impresion/FacturaCreditoVehiculo', compact('factura'));
            }
        } else if ($factura->area_factura === 'LC') {
            if ($factura->tipo == 'consumidor') {
                return view('/common/factura/impresion/FacturaCuota', compact('factura'));
            } else {
                return view('/common/factura/impresion/FacturaCreditoCuota', compact('factura'));
            }
        } else if ($factura->area_factura === 'O'){
            if ($factura->tipo == 'consumidor') {
                return view('/common/factura/impresion/FacturaServicios', compact('factura'));
            } else {
                return view('/common/factura/impresion/FacturaCreditoServicio', compact('factura'));
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
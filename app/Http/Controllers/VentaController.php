<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Credito;
use App\Models\Factura;
use App\Models\Servicio;
use App\Models\Vehiculo;
use App\Models\Venta;
use App\Models\Ventas_no_Facturadas;
use Exception;
use Illuminate\Http\Request;

class VentaController extends Controller
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
    public function store_venta_servicio(Request $request)
    {  
        try {
            $servicios = [];
           
            $s = json_decode($request['servicios'],true); //$request['json_array']; 
            
            $sev = $s['servicios']['servicios']; 

            //$cliente = Cliente::where('doc', $request['json_array']['doc'])->get()->setAppends([]);
            //$vehiculo = Cliente::where('doc', $request['json_array']['placa'])->get();

            //if(!$cliente){
                $cliente = [];
                $cliente['nombre'] = $s['nombre'];
                $cliente['apellido'] = $s['apellido'];
                $cliente['doc'] = $s['doc'];
                $cliente['direccion'] = "";
            //}          

            if(count($s['servicios']['servicios']) > 6){
                $sev = [];
                $servicios['STP'] = ["cantidad" => 0,"total" => 0];
                $servicios['STA'] = ["cantidad" => 0,"total" => 0];
                $servicios['SC']  = ["cantidad" => 0,"total" => 0];

                foreach($s['servicios']['servicios'] as $servicio){
                    
                    if($servicio['area_empresa'] === 'SC'){
                        $aux['cantidad'] = ($servicios['SC']['cantidad'] + (int) $servicio['cantidad']);
                        $aux['codigo'] = 'SC';
                        $aux['descripcion'] = 'Servicios de CarWash';
                        $aux['precio_unitario'] = "";
                        $aux['total'] = ($servicios['SC']['total'] + (float) $servicio['total']);

                        $servicios['SC'] = $aux;
                    }else if($servicio['area_empresa'] === 'STA'){
                        $aux['cantidad'] = ($servicios['STA']['cantidad'] + (int) $servicio['cantidad']);
                        $aux['codigo'] = 'STA';
                        $aux['descripcion'] = 'Servicios de Taller Automotriz';
                        $aux['precio_unitario'] = "";
                        $aux['total'] = ($servicios['STA']['total'] + (float) $servicio['total']);

                        $servicios['STA'] = $aux;
                    }else if($servicio['area_empresa'] === 'STP'){
                        $aux['cantidad'] = ($servicios['STP']['cantidad'] + (int) $servicio['cantidad']);
                        $aux['codigo'] = 'STP';
                        $aux['descripcion'] = 'Servicios de Taller Pintura';
                        $aux['precio_unitario'] = "";
                        $aux['total'] = ($servicios['STP']['total'] + (float) $servicio['total']);

                        $servicios['STP'] = $aux;
                    }
                }

                $sev[] =  $servicios['STP'];
                $sev[] =  $servicios['STA'];
                $sev[] =  $servicios['SC'];
            }
            
            $payload = [
                "Cliente" => $cliente,
                "placa" => $request->placa,
                "n_factura" => $request->n_factura,
                "tipo" => $request->tipo,
                "area_factura" => "O",
                "descripcion" => $request->descripcion,
                "monto" => $s['servicios']['total'],
                "total" => $s['servicios']['subtotal'],
                "desc" => $s['servicios']['desc'],
                "servicios" => $sev,
                "ncr" => $request->ncr,
                
            ];

            $factura = Factura::create([
                'n_factura' => $request->n_factura,
                'cliente_id' => null,
                'credito_id' => null,
                'vehiculo_id' => null,
                'tipo' => $request->tipo,
                'area_factura' => "O",
                'descripcion' => "Pago de Servicios",
                'payload' => $payload, //*Informacion necesaria que para poder generar una factura en el archivo o controaldor
            ]);

            Ventas_no_Facturadas::where('id',$request->id)->delete();

            return redirect()->route('factura.show', $factura->id);
        
        } catch (Exception $ex) {
            return redirect()->route('sell')
                ->with('message', 'Ocurrio un error al crear la factura')
                ->with('status', 'warning');
       }
    }


    public function create_venta_vehiculo($vehiculo_id = 0, $cliente_id = 0)
    {

        $cliente = $cliente_id == 0 ? new Cliente : Cliente::findOrFail($cliente_id);
        $vehiculo = $vehiculo_id == 0 ? new Vehiculo : Vehiculo::findOrFail($vehiculo_id);

        return view('/common/venta/create', ['vehiculo' => $vehiculo, 'cliente' => $cliente]);
    }

    public function store_venta_vehiculo(Request $request)
    {
        $cliente = Cliente::findOrFail($request->cliente_id)->setAppends([]);
        $vehiculo = Vehiculo::findOrFail($request->vehiculo_id);

        $payload = [
            "Cliente" => $cliente,
            "Vehiculo" => $vehiculo,
            "n_factura" => $request->n_factura,
            "tipo" => $request->tipo,
            "area_factura" => "V",
            "tipo_venta" => $request->tipo_venta,
            "descripcion" => "Venta de Vehiculo",
            "monto" => $request->monto,
            "fecha" => $request->fecha_venta,
            "ncr" => $request->ncr,
        ];

        if ($request->tipo_venta === 'contado') {

            $factura = Factura::create([
                'n_factura' => $request->n_factura,
                'cliente_id' => (int) $cliente->cliente_id,
                'credito_id' => null,
                'vehiculo_id' => (int) $vehiculo->vehiculo_id,
                'tipo' => $request->tipo,
                'area_factura' => "V",
                'descripcion' => "Venta de Vehiculo",
                'payload' => $payload, //*Informacion necesaria que para poder generar una factura en el archivo o controaldor
            ]);

            $vehiculo->where('id', $request->vehiculo_id)->update(['estado' => 'V']);

            return redirect()->route('factura.show', $factura->id);
        } else {

            $saldo = $request->monto - $request->prima;

            $json_array = [
                'tipo' => $request->tipo,
                "fecha_venta" => $request->fecha_venta,
                "ncr" => $request->ncr,
                "prima" => $request->prima,
                "saldo" => $saldo,
            ];

            $fecha = preg_split("/[\s-]/", $request->fecha_venta);

            $dia_pago = $fecha[2];

            $credito = [
                'vehiculo_id' => (int) $request->vehiculo_id,
                'cliente_id' => (int) $request->cliente_id,
                'n_coutas' => (int) $request->n_coutas,
                'dia_pago' => (int) $dia_pago,
                'monto' => (float) $saldo,
                'interes' => (float) $request->interes,
                'ult_pago' => $request->fecha_venta,
                'json_array' => $json_array,
            ];

            $result = Credito::create($credito);

            $factura = Factura::create([
                'n_factura' => $request->n_factura,
                'cliente_id' => (int) $cliente->cliente_id,
                'credito_id' => (int) $result->id,
                'vehiculo_id' => (int) $vehiculo->vehiculo_id,
                'tipo' => $request->tipo,
                'area_factura' => "V",
                'descripcion' => "Venta de Vehiculo a Credito",
                'payload' => $payload, //*Informacion necesaria que para poder generar una factura en el archivo o controaldor
            ]);

            $vehiculo->where('id', $request->vehiculo_id)->update(['estado' => 'VP']);

            return redirect()->route('factura.show', $factura->id);
        }
    }

    public function buscarVC(Request $request)
    {

        $criterio = $request->request->get('criterio');
        $type = $request->request->get('type');
        $cliente_id = $request->request->get('cliente_id');
        $vehiculo_id = $request->request->get('vehiculo_id');

        try {

            if ($type == 'cliente') {
                $cliente = Cliente::where('doc', $criterio)
                    ->orWhere('id', $criterio)
                    ->firstOrFail();
                $cliente_id = $cliente->id;
            }

            if ($type == 'vehiculo') {
                $vehiculo = Vehiculo::where('placa', $criterio)
                    ->orWhere('id', $criterio)
                    ->where('estado', 'D')
                    ->firstOrFail();
                $vehiculo_id = $vehiculo->id;
            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {

            return redirect()->route('venta.vehiculo', [$request->request->get('vehiculo_id'), $request->request->get('cliente_id')])
                ->with('message', 'No se encontro el criterio de busqueda')
                ->with('status', 'warning');
        }

        return redirect()->route('venta.vehiculo', [$vehiculo_id, $cliente_id])
            ->with('message', $criterio . ' encontrado!')
            ->with('status', 'success');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        //
    }
}
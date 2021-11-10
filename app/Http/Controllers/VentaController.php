<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Credito;
use App\Models\Factura;
use App\Models\Vehiculo;
use App\Models\Venta;
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
    public function store(Request $request)
    {
        //
    }

    public function create_venta_vehiculo($vehiculo_id = 0,$cliente_id = 0)
    {
    
        $cliente = $cliente_id == 0 ? new Cliente : Cliente::findOrFail($cliente_id);
        $vehiculo = $vehiculo_id == 0 ? new Vehiculo : Vehiculo::findOrFail($vehiculo_id);
        
        return view('/common/venta/create',['vehiculo'=>$vehiculo,'cliente'=>$cliente]);        
    }

    public function store_venta_vehiculo(Request $request)
    {
        $cliente = Cliente::findOrFail($request->cliente_id)->setAppends([]);
        $vehiculo = Vehiculo::findOrFail($request->vehiculo_id);

        $payload = [
            "Cliente"=>$cliente,
            "Vehiculo"=>$vehiculo,
            "n_factura"=>$request->n_factura,
            "tipo"=>$request->tipo,
            "area_factura"=>"V",
            "descripcion"=>"Venta de Vehiculo",
            "monto" => $request->monto,
            "fecha_venta" => $request->fecha_venta,
            "ncr" => $request->ncr,
        ]; 

        $vehiculo->where('id',$request->vehiculo_id)->update(['estado'=>'V']);

        if($request->tipo_venta === 'contado'){

            $factura = Factura::create([
                'n_factura'=>$request->n_factura,
                'cliente_id' => (Int) $cliente->cliente_id,
                'credito_id' => null,
                'vehiculo_id' => (Int) $vehiculo->vehiculo_id,
                'tipo'=>$request->tipo,
                'area_factura'=>"V",
                'descripcion'=>"Venta de Vehiculo",
                'payload'=> $payload, //*Informacion necesaria que para poder generar una factura en el archivo o controaldor
            ]);
    
            return redirect()->route('factura.show',$factura->id);

        }else{
           
            $saldo = $request->monto - $request->prima;

            $json_array = [
                'tipo'=>$request->tipo,
                "fecha_venta" => $request->fecha_venta,
                "ncr" => $request->ncr,
                "prima" => $request->prima,
                "saldo" => $saldo,
            ];

            $fecha = preg_split("/[\s-]/", $request->fecha_venta);
            
            $dia_pago = $fecha[2]; 

            $credito = [
                'vehiculo_id' => (Int) $request->vehiculo_id,
                'cliente_id' => (Int) $request->cliente_id,
                'n_coutas' => (Int) $request->n_coutas,
                'dia_pago' => (Int) $dia_pago,
                'monto' => (Float) $saldo,
                'interes' => (Float) $request->interes,
                'ult_pago' => $request->fecha_venta,
                'json_array' => $json_array,
            ];

            $result = Credito::create($credito);

            $factura = Factura::create([
                'n_factura'=>$request->n_factura,
                'cliente_id' => (Int) $cliente->cliente_id,
                'credito_id' => (Int) $result->id,
                'vehiculo_id' => (Int) $vehiculo->vehiculo_id,
                'tipo'=>$request->tipo,
                'area_factura'=>"V",
                'descripcion'=>"Venta de Vehiculo",
                'payload'=> $payload, //*Informacion necesaria que para poder generar una factura en el archivo o controaldor
            ]);

            return redirect()->route('factura.show',$factura->id); 
        }

    }

    public function buscarVC(Request $request)
    {

        $criterio = $request->request->get('criterio');
        $type = $request->request->get('type');
        $cliente_id = $request->request->get('cliente_id');
        $vehiculo_id = $request->request->get('vehiculo_id');

        try{

        if($type == 'cliente'){
            $cliente = Cliente::where('doc',$criterio)
                        ->orWhere('id',$criterio)
                        ->firstOrFail();
            $cliente_id = $cliente->id;
        }

        if($type == 'vehiculo'){
            $vehiculo = Vehiculo::where('placa',$criterio)
                        ->orWhere('id',$criterio)
                        ->where('estado','D')
                        ->firstOrFail();
            $vehiculo_id = $vehiculo->id;
        }
        
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            
            return redirect()->route('venta.vehiculo',[$request->request->get('vehiculo_id'),$request->request->get('cliente_id')])
            ->with('message','No se encontro el criterio de busqueda')
            ->with('status','warning');
        }
        
        return redirect()->route('venta.vehiculo',[$vehiculo_id,$cliente_id])
        ->with('message',$criterio.' encontrado!')
        ->with('status','success');
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

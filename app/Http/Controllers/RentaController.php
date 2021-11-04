<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Renta;
use App\Models\Vehiculo;
use App\Models\Factura;
use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;

class RentaController extends Controller
{
    public function index()
    {
        $renta = Renta::paginate(16);
        return view('/common/renta/index', compact('renta'));
    }

    public function create($vehiculo_id = 0,$cliente_id = 0)
    {
        $cliente = $cliente_id == 0 ? new Cliente : Cliente::findOrFail($cliente_id);
        $vehiculo = $vehiculo_id == 0 ? new Vehiculo : Vehiculo::findOrFail($vehiculo_id);
        
        return view('/common/renta/create',['vehiculo'=>$vehiculo,'cliente'=>$cliente]);
    }

    public function create_renta(){

    }

    public function store(Request $request)
    {
        $cliente = Cliente::findOrFail($request->cliente_id);
        $vehiculo = Vehiculo::findOrFail($request->vehiculo_id);

        $payload = [
            "Cliente"=>$cliente,
            "Vehiculo"=>$vehiculo,
            "n_factura"=>$request->n_factura,
            "tipo"=>$request->tipo,
            "area_factura"=>"R",
            "descripcion"=>"Renta de Vehiculo",
            "monto" => $request->monto,
        ]; 

        $factura = Factura::create([
            'n_factura'=>$request->n_factura,
            'cliente_id' => (Int) $cliente->cliente_id,
            'credito_id' => null,
            'vehiculo_id' => (Int) $vehiculo->vehiculo_id,
            'tipo'=>$request->tipo,
            'area_factura'=>"R",
            'descripcion'=>"Renta de Vehiculo",
            'payload'=> $payload, //*Informacion necesaria que para poder generar una factura en el archivo o controaldor
        ]);
      
        $request->merge(['factura_id' =>  $factura->id]);
        $request->merge(['json_array' =>  $payload]);

        $renta = $request->validate([
            'vehiculo_id' => 'required',
            'dias' => 'required',
            'monto' => 'required',
            'cliente_id' => 'required',
            'factura_id' => 'required',
            'json_array' => 'required',
        ]);

        $result = Renta::create($renta);

         return $result;
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    //Para buscar Vehiculo o cliente
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
            
            return redirect()->route('renta.create',[$request->request->get('vehiculo_id'),$request->request->get('cliente_id')])
            ->with('message','No se encontro el criterio de busqueda')
            ->with('status','warning');
        }
        
        return redirect()->route('renta.create',[$vehiculo_id,$cliente_id])
        ->with('message',$criterio.' encontrado!')
        ->with('status','success');
    }
}

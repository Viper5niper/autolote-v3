<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Renta;
use App\Models\Vehiculo;
use App\Models\Factura;
use Exception;
use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;

class RentaController extends Controller
{
    public function index()
    {
        $renta = Renta::paginate(16);
        return view('/common/renta/index', compact('renta'));
    }

    public function create($vehiculo_id = 0, $cliente_id = 0)
    {
        $cliente = $cliente_id == 0 ? new Cliente : Cliente::findOrFail($cliente_id);
        $vehiculo = $vehiculo_id == 0 ? new Vehiculo : Vehiculo::findOrFail($vehiculo_id);

        return view('/common/renta/create', ['vehiculo' => $vehiculo, 'cliente' => $cliente]);
    }

    public function return_vehiculo($id)
    {
        try {

            $renta = Renta::findOrFail($id);
            return view('common.renta.return_vehiculo', compact('renta'));
        } catch (Exception $th) {
            return redirect()->route('renta.return', $id)
                ->with('message', 'No se encontro el vehiculo')
                ->with('status', 'warning');
        }
    }

    public function store(Request $request)
    {
        $cliente = Cliente::findOrFail($request->cliente_id)->setAppends([]);
        $vehiculo = Vehiculo::findOrFail($request->vehiculo_id);

        $payload = [
            "Cliente" => $cliente,
            "Vehiculo" => $vehiculo,
            "n_factura" => $request->n_factura,
            "tipo" => $request->tipo,
            "area_factura" => "R",
            "descripcion" => "Renta de Vehiculo",
            "monto" => $request->monto,
            "total" => $request->total,
            "dias" => $request->dias,
            "inicio" => $request->inicio,
            "final" => $request->final,
            "ncr" => $request->ncr,
        ];

        $factura = Factura::create([
            'n_factura' => $request->n_factura,
            'cliente_id' => (int) $cliente->cliente_id,
            'credito_id' => null,
            'vehiculo_id' => (int) $vehiculo->vehiculo_id,
            'tipo' => $request->tipo,
            'area_factura' => "R",
            'descripcion' => "Renta de Vehiculo",
            'payload' => $payload, //*Informacion necesaria que para poder generar una factura en el archivo o controaldor
        ]);

        $request->merge(['factura_id' =>  $factura->id]);
        $request->merge(['json_array' =>  $payload]);

        $vehiculo->where('id', $request->vehiculo_id)->update(['estado' => 'R']);

        $renta = $request->validate([
            'vehiculo_id' => 'required',
            'dias' => 'required',
            'monto' => 'required',
            'cliente_id' => 'required',
            'factura_id' => 'required',
            'json_array' => 'required',
        ]);

        $result = Renta::create($renta);

        return redirect()->route('factura.show', $factura->id);
    }

    public function show($id)
    {
        try {

            $renta = Renta::findOrFail($id);
            return view('common.renta.show', compact('renta'));
        } catch (Exception $th) {
            return redirect()->route('rentas', $id)
                ->with('message', 'No se encontro el vehiculo')
                ->with('status', 'warning');
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
       
        if($request->n_dias === "0"){
            
            $renta = Renta::find($id);
            $vehiculo = Vehiculo::find($renta['vehiculo_id']);

            $renta->where('id',$id)->update(['estado'=>'0']);
            $vehiculo->where('id', $vehiculo['id'])->update(['estado' => 'D']);

            return redirect()->route('renta', $id)
            ->with('message', 'Vehiculo Devuelto con exito')
            ->with('status', 'success');

        }else{
            
            $renta = Renta::find($id);
            $vehiculo = Vehiculo::find($renta['vehiculo_id']);
            $cliente = Cliente::find($renta['cliente_id']);

            $renta->where('id',$id)->update(['estado'=>'0']);
            $vehiculo->where('id', $vehiculo['id'])->update(['estado' => 'D']);
            
            $payload = [
                "Cliente" => $cliente,
                "Vehiculo" => $vehiculo,
                "n_factura" => $request->n_factura,
                "tipo" => $request->tipo,
                "area_factura" => "R",
                "descripcion" => "Pago de Mora",
                "mora" => "$request->mora",
                "monto" => $request->mora,
                "total" => $request->total,
                "dias" => $request->n_dias,
                "inicio" => $request->inicio,
                "final" => $request->final,
                "ncr" => $request->ncr,
                
            ];

            $factura = Factura::create([
                'n_factura' => $request->n_factura,
                'cliente_id' => (int) $request->cliente_id,
                'credito_id' => null,
                'vehiculo_id' => (int) $request->vehiculo_id,
                'tipo' => $request->tipo,
                'area_factura' => "R",
                'descripcion' => "Pago de Mora",
                'payload' => $payload, //*Informacion necesaria que para poder generar una factura en el archivo o controaldor
            ]);

            return redirect()->route('factura.show', $factura->id);
        }
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

            return redirect()->route('renta.create', [$request->request->get('vehiculo_id'), $request->request->get('cliente_id')])
                ->with('message', 'No se encontro el criterio de busqueda')
                ->with('status', 'warning');
        }

        return redirect()->route('renta.create', [$vehiculo_id, $cliente_id])
            ->with('message', $criterio . ' encontrado!')
            ->with('status', 'success');
    }
}
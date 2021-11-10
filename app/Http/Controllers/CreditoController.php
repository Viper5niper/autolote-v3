<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Credito;
use App\Models\Factura;
use App\Models\Vehiculo;
use Exception;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;

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
       
    }

    public function credito_pay($param = 0){
        $credito = [$param];
        return view('common.credito.pay',compact('credito'));
    }

    public function buscar_credito(Request $request){
        
        try { 
            
            $respuesta = [];
            $result = preg_match('/^\d{8}-\d{1}$/',$request->param);
    
            if($result == 0){
                $credito = Credito::where('id',$request->param)
                ->orWhere('cliente_id',$request->param)->firstOrFail();
                
                $respuesta['cliente'] = $credito->cliente;
                unset($credito->cliente);
                $respuesta['credito'] = $credito;
               
            }else{
                $cliente = Cliente::where('doc',$request->param)->firstOrFail();
                $respuesta['credito'] = $cliente->creditos;
                unset($cliente->creditos);
                $respuesta['cliente'] = $cliente;
                
            }

            return view('common.credito.pay',compact('respuesta'));

        } catch(Exception $ex){ 
            
            $respuesta = ['credito' => Credito::class, 'cliente' => Cliente::class];
            
            return redirect()->route('credito.pay',compact('respuesta'))
            ->with('message','No se encontro el criterio de busqueda')
            ->with('status','warning');
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
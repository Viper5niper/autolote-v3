<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculadoraController extends Controller
{
    public function index(Request $request)
    {
        return view("common.calculadora.index",['info'=>$request]);
    }

    public function generate(Request $request)
    {
        $interes = 0;
        $cuotas = 0;
        $monto = 0;
        $cuota = floor(($request->monto/$request->cuotas)/1);
        $nmonto = $request->monto; 
        $tabla = [];

        for($i = 0; $i < $request->cuotas; $i++){
            $interess = $nmonto * $request->interes;
            $cuota = floor($cuota);
                       
            if ($i != $request->cuotas-1) {
                $interess = round($interess);
                $nmonto = $nmonto-$cuota;
                $montoapagar = $cuota + $interess;
                $monto += $montoapagar;
                $montoapagar = ceil($montoapagar);
                $nmonto = floor($nmonto);
                $interes += $interess;
                $cuotas += $cuota;
            
                $tabla[$i] = [
                    "letra" => $i+1,
                    "cuota" => $cuota,
                    "interes" => $interess,
                    "monto_pagar" =>  $montoapagar,
                    "monto_restante" => $nmonto,
                ];

            }else{
                
                $interes2=round($interess);
			    $ultcuota= $request->monto - $cuotas;
			    $ultcuota=floor($ultcuota);
			    $nmonto=$nmonto-$ultcuota;
			    $nmonto=ceil($nmonto);
		    	$montoapagarf=$ultcuota+$interes2;
			    $monto += $montoapagarf;
			    $montoapagarf=ceil($montoapagarf);
			    $interes += $interes2;
			    $monto = ceil($monto);

                if($request->totales == 1){     
                    $tabla[$i] = [
                    "letra" => $i+1,
                    "cuota" => $ultcuota,
                    "interes" => $interes2,
                    "monto_pagar" =>  $montoapagarf,
                    "monto_restante" => $nmonto,
                    ];

                    $tabla[$i+1] = [
                        "letra" => "",
                        "cuota" => "Totales",
                        "interes" => $interes2,
                        "monto_pagar" =>  $monto,
                        "monto_restante" => "-------",
                    ];
                }else{
                    $tabla[$i+1] = [
                        "letra" => $i+1,
                        "cuota" => $ultcuota,
                        "interes" => $interes2,
                        "monto_pagar" =>  $montoapagarf,
                        "monto_restante" => $nmonto,
                    ];
                }
                
            }
        }

        return view('common.calculadora.generate',['info'=>$request,'tabla'=>$tabla]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Request $request,$id = null)
    {
       
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
}

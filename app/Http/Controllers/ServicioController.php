<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $servicios =  Servicio::paginate(16);
        return view('admin.servicio.index', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Servicio $servicio)
    {
        return view('admin.servicio.create',compact('servicio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->validate(
            [
                'area_empresa' => 'required',
                'precio' => 'required',
                'descuento' => '',
                'descripcion' => 'required',
            ]
        );

        $fields = toUppercase($fields);
        $fields['descuento'] = $fields['descuento'] / 100;
        $correlativo = Servicio::where('cod', 'like', $fields['area_empresa'].'%')->orderBy('cod', 'desc')->limit(1)->get();

        
        if(empty($correlativo[0])){
            $correlativo = $fields['area_empresa']."0001";
            $fields['cod'] = $correlativo;
        }else{

            $area = strlen($fields['area_empresa']);

            $numero = (int) substr($correlativo[0]['cod'], 3);
            $numero++;
        
            $numero = $numero < 10 ? "000".$numero : $numero;
            $numero = $numero < 100 && $numero >= 10 ? "00".$numero : $numero;
            $numero = $numero >= 1000 ? "0".$numero : $numero;

            $fields['cod'] = $fields['area_empresa'] . $numero; 
        }

        $servicio = Servicio::create($fields);

        return redirect()->route('servicios')
            ->with('message', 'Servicio creado.')
            ->with('status', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show(Servicio $servicio)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicio $servicio)
    {
        return view('admin.servicio.edit', compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $fields = $request->validate(
            [
                'area_empresa' => '',
                'precio' => 'required',
                'descuento' => '',
                'descripcion' => 'required',
            ]
        );

        $fields = toUppercase($fields);
        $fields['descuento'] = $fields['descuento'] / 100;
      
        
        $servicio = Servicio::find($id);

        $servicio->update($fields);

        return redirect()->route('servicios')
            ->with('message', 'Servicio editado.')
            ->with('status', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Servicio::findOrFail($id)->delete();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {

            return redirect()->route('servicios')
                ->with('message', 'Peticion no puede ser procesada servicio no existe [S003]')
                ->with('status', 'warning');
        }

        return redirect()->route('servicios')
            ->with('message', 'Servicio eliminado.')
            ->with('status', 'success');
    }
}

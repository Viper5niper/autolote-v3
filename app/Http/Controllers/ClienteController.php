<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveClienteRequest;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($message = null)
    {   

        $clientes = Cliente::get();
        //dd($message);
        //dd($clientes->toJson());
        $heads = [
            'id',
            'nombre',
            'apellido',
            'tipo_doc',
            'doc',
            'direccion',
            'telefono',
            'celular',
            'licencia',
            'actions',
        ];

        $items = $clientes->map->only($heads);

        $config = [
            'data' => $items,
            'order' => [[1, 'asc']],
            'columns' => [null, null, null, ['orderable' => false]],
        ];

        return view('admin.cliente.index', ["config" => $config, "heads" => $heads]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cliente.create',['cliente'=>new Cliente]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\SaveClienteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveClienteRequest $request)
    {   
        $validated = $request->validated();

        Cliente::create($validated);        
        
        return redirect()->route('cliente.index')
        ->with('message','Cliente creado.')
        ->with('status','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return view('admin.cliente.show', $cliente->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {   
        return view('admin.cliente.edit', ['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\SaveClienteRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveClienteRequest $request, $id)
    {   
        $validated = $request->validated();

        $cliente = Cliente::find($id)->update($validated);

        return redirect()->route('cliente.index')
        ->with('message','Informacion editada.')
        ->with('status','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cliente::findOrFail($id)->delete();
        return redirect()->route('cliente.index')
        ->with('message','Cliente eliminado.')
        ->with('status','success');
    }
}

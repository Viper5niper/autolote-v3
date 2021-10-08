<?php

namespace App\Http\Controllers;

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
        return view('admin.cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validated = $request->validate([
            'nombre'    => 'required|max:255',
            'apellido'  => 'required|max:255',
            'email'     => 'required|email|max:255',
            'direccion' => 'required|max:255',
            'telefono'  => 'required|max:255',
            'celular'   => 'required|max:255',
            'tipo_doc'  => 'required|max:255',
            'doc' => 'required|max:255',
            'licencia'  => 'required|max:255',
        ]);

        Cliente::create($validated);
        return view('admin.cliente.create', ['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::find($id)->toArray();
        return view('admin.cliente.show', $cliente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id)->toArray();
        return view('admin.cliente.edit', $cliente);
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
        $validated = $request->validate([
            'nombre'    => 'required|max:255',
            'apellido'  => 'required|max:255',
            'email'     => 'required|email|max:255',
            'direccion' => 'required|max:255',
            'telefono'  => 'required|max:255',
            'celular'   => 'required|max:255',
            'tipo_doc'  => 'required|max:255',
            'doc' => 'required|max:255',
            'licencia'  => 'required|max:255',
        ]);

        $cliente = Cliente::find($id);
        $cliente->update($validated);

        return redirect()->route('cliente.index')->with('message','Se edito el cliente');
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
        return redirect()->route('cliente.index')->with('message','Se elimino el cliente');
    }
}

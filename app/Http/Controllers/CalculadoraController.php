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
        return view('common.calculadora.generate',['info'=>$request]);
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

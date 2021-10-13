<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class RentaController extends Controller
{
    public function index($id){
        return view('/admin/vehiculo/renta_vehiculo',['vehiculo'=>Vehiculo::findOrFail($id)]);
    }

    public function store($data){
        return $data;
    }
}

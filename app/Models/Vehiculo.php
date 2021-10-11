<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'placa',
        'vto',
        'marca',
        'modelo',
        'color',
        'anio',
        'capacidad',
        'clase',
        'traccion',
        'tipo',
        'dominio',
        'n_motor',
        'n_chasis',
        'n_vin',
        'calidad',
        'estado',
        'n_pol_s',
        'v_pol_s'
    ];

    protected $appends = ['id', 'created_at', 'update_at'];
}

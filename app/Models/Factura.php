<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $fillable = [
        'n_factura',
        'cliente_id',
        'credito_id',
        'vehiculo_id',
        'tipo',
        'area_factura',
        'descripcion',
        'payload',
    ];

    protected $casts = ['payload'=>'array'];

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function vehiculo(){
        return $this->belongsTo(Vehiculo::class);
    }

    // public function cliente(){
    //     return $this->belongsTo(Cliente::class);
    // }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;

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

    protected $casts = ['payload' => 'array'];

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id');
    }
}
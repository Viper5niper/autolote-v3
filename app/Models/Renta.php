<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renta extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehiculo_id',
        'dias',
        'monto',
        'cliente_id',
        'factura_id',
        'json_array'
    ];

    protected $casts = ['json_array' => 'array'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function vehiculos()
    {
        return $this->belongsTo(Vehiculo::class);
    }
}
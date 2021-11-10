<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $fillable = [
        'pendiente',
        'n_coutas',
        'dia_pago',
        'monto',
        'interes', 
        'ult_pago',
        'cliente_id',
        'vehiculo_id',
        'json_array',
    ];

    protected $casts = ['json_array'=>'array'];

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

}

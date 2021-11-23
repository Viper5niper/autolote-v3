<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas_no_Facturadas extends Model
{
    use HasFactory;

    protected $fillable = [
        'json_array',
    ];

    protected $casts = ['json_array' => 'array'];
}

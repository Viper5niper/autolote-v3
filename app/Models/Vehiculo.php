<?php

namespace App\Models;

use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\File as F;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    protected $appends = ['images', 'path'];

    protected static function booted()
    {

        static::created(function ($vehiculo) {
            $folder_name = $vehiculo['placa'] . '-' . $vehiculo['id'];
            $path = public_path() . '/v/' . $folder_name;
            $result = F::makeDirectory($path, 0775, true);
        });

        static::updated(function($vehiculo){
            $path = public_path() . '/v/' . $vehiculo->placa . '-' . $vehiculo->id;
            !is_dir($path) && F::makeDirectory($path, 0775, true);
        });

        static::deleted(function ($vehiculo) {
            $path = public_path() . '/v/' . $vehiculo->placa . '-' . $vehiculo->id;
            is_dir($path) && delete_files($path);
        });
    }

    public function rentas(){
        return $this->hasMany(Renta::class);
    }

    public function getPathAttribute()
    {
        return '/v/' . $this->placa . '-' . $this->id . '/';
    }

    public function getImagesAttribute()
    {
        $path = public_path() . '/v/' . $this->placa . '-' . $this->id;
        return is_dir($path) ? array_slice(scandir($path), 2) : [];
    }

    public function facturas(){
        return $this->hasMany(Facturas::class);
    }


}

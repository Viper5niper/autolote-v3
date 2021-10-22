<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File as F;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'doc',
        'direccion',
        'telefono',
        'celular',
        'nit',
        'licencia',
        'isss',
        'nup',
        'profesion',
        'area_empresa',
        'cargo',
    ];

    protected $appends = ['images', 'path'];
    
    protected static function booted()
    {

        static::created(function ($empleado) {
            $folder_name = $empleado['doc'];
            $path = public_path() . '/e/' . $folder_name;
            $result = F::makeDirectory($path, 0775, true);
        });

        static::updated(function($empleado){
            $path = public_path() . '/e/' . $empleado->doc;
            !is_dir($path) && F::makeDirectory($path, 0775, true);
        });

        static::deleted(function ($empleado) {
            User::where('empleado_id',$empleado->id)->delete();
            $path = public_path() . '/e/' . $empleado->doc;
            is_dir($path) && delete_files($path);
        });
    }

    public function getPathAttribute()
    {
        return '/e/' . $this->doc .'/';
    }

    public function getImagesAttribute()
    {
        $path = public_path() . '/e/' . $this->doc;
        return is_dir($path) ? array_slice(scandir($path), 2) : [];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
            'nombre'   ,
            'apellido' ,
            'email'    ,
            'direccion',
            'telefono' ,
            'celular'  ,
            'tipo_doc' ,
            'doc',
            'licencia' ,
    ];

    protected $appends = ['actions'];

    public function getActionsAttribute(){

        $btnEdit = '<a class="btn btn-s btn-default text-primary mx-1 shadow" href="/cliente/'.$this->id.'" title="Edit">
                        <i class="fa fa-lg fa-fw fa-eye"></i>
                    </a>';
        $btnDelete = '<a class="btn btn-s btn-default text-danger mx-1 shadow delete_client" href="/cliente/delete/'.$this->id.'"" title="Delete">
                          <i class="fa fa-lg fa-fw fa-trash"></i>
                      </a>';
        $btnDetails = '<a class="btn btn-s btn-default text-teal mx-1 shadow" href="/cliente/'.$this->id.'/edit" title="Details">
                          <i class="fa fa-lg fa-fw fa-pen"></i>
                       </a>';

        return '<nobr>'.$btnDetails.$btnEdit.$btnDelete.'</nobr>';
    }
}

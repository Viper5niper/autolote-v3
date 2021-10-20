<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'empleado_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ]; 

    protected $appends = ['actions'];

    public function getActionsAttribute(){

        $btnEdit = '<a class="btn btn-s btn-default text-primary mx-1 shadow" href="/cliente/'.$this->id.'" title="Edit">
                        <i class="fa fa-lg fa-fw fa-eye"></i>
                    </a>';
        $btnDelete = '<a class="btn btn-s btn-default text-danger mx-1 shadow delete_client" href="/cliente/delete/'.$this->id.'"" title="Delete">
                          <i class="fa fa-lg fa-fw fa-trash"></i>
                      </a>';
        $btnDetails = '<a class="btn btn-s btn-default text-teal mx-1 shadow" href="/cliente/'.$this->id.'/editar" title="Details">
                          <i class="fa fa-lg fa-fw fa-pen"></i>
                       </a>';

        return '<nobr>'.$btnDetails.$btnEdit.$btnDelete.'</nobr>';
    }
}

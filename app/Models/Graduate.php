<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Graduate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'numero',
        'fecha_expedicion',
        'nombre',
        'identificacion',
        'resolucion',
        'graduado',
        'correo',
        'telefono',
    ];
}

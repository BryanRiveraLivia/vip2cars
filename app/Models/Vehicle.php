<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
   protected $fillable = [
    'placa', 'marca', 'modelo', 'anio_fabricacion',
    'nombre_cliente', 'apellidos_cliente', 'documento_cliente',
    'correo_cliente', 'telefono_cliente'
];

}
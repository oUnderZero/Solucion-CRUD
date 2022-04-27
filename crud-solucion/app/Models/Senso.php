<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Senso extends Model
{
    use HasFactory;
    protected $fillable = ['DNI', 'NOMBRE', 'APELLIDO_PATERNO', 'APELLIDO_MATERNO', 'DIRECCION', 'TELEFONO', 'FECHA_NACIMIENTO'];
    protected $table = 'senso_usuarios';
}

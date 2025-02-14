<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empresa extends Model
{
    protected $table = 'empresas';
    protected $primaryKey = 'id_empresa'; // Asegúrate de que esto esté definido
    public $incrementing = true;

    protected $fillable = [
        'nombre_empresa',
        'descripcion_empresa'
    ];
}

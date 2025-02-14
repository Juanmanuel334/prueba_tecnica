<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Trayecto extends Model
{
    protected $table = 'trayectos';
    protected $primaryKey = 'id_trayecto'; // Asegúrate de que esto esté definido
    public $incrementing = true;

    protected $fillable = [
        'origen',
        'destino',
        'kms',
        'tiempo_aprox',
        'hora_salida',
        'hora_llegada',
        'fecha',
        'precio'
    ];
}

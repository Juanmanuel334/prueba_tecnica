<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Precio extends Model
{
    use HasFactory;

    protected $table = 'trayectos';
    protected $primaryKey = 'id_trayectos';

    protected $fillable = [
        'precio',
    ];
}


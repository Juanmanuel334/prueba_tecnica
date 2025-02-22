<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('trayectos', function (Blueprint $table) {
            $table->bigIncrements('id_trayecto');
            $table->string('origen');
            $table->string('destino');
            $table->integer('kms');
            $table->string('tiempo_aprox');
            $table->string('hora_salida');
            $table->string('hora_llegada');
            $table->string('fecha');
            $table->timestamps();
            $table->string('precio');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trayectos');
    }
};

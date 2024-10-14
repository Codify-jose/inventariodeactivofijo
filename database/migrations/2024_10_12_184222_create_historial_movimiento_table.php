<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('historial_movimiento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_activo');
            $table->unsignedBigInteger('id_ubicacion_anterior');
            $table->unsignedBigInteger('id_ubicacion_nueva');
            $table->date('fecha_movimiento');
            $table->unsignedBigInteger('id_usuario');
            $table->timestamps();

            $table->foreign('id_activo')->references('id')->on('activos');
            $table->foreign('id_ubicacion_anterior')->references('id')->on('ubicaciones');
            $table->foreign('id_ubicacion_nueva')->references('id')->on('ubicaciones');
            $table->foreign('id_usuario')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_movimiento');
    }
};

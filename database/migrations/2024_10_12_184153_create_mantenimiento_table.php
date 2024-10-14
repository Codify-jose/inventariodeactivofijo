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
        Schema::create('mantenimiento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_activo');
            $table->date('fecha_mantenimiento');
            $table->double('costo');
            $table->string('descripcion', 200);
            $table->unsignedBigInteger('id_usuario');
            $table->timestamps();

            $table->foreign('id_activo')->references('id')->on('activos');
            $table->foreign('id_usuario')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mantenimiento');
    }
};

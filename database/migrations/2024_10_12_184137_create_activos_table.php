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
        Schema::create('activos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('descripcion', 200);
            $table->string('codigo_inventario', 100);
            $table->date('fecha_adquisicion');
            $table->double('valor');
            $table->double('depreciacion');
            $table->unsignedBigInteger('id_categoria');
            $table->unsignedBigInteger('id_ubicacion');
            $table->unsignedBigInteger('id_usuario');
            $table->timestamps();

            $table->foreign('id_categoria')->references('id')->on('categorias_activos');
            $table->foreign('id_ubicacion')->references('id')->on('ubicaciones');
            $table->foreign('id_usuario')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activos');
    }
    
};

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
        Schema::create('mascota_cliente', function (Blueprint $table) {
            
            $table->unsignedBigInteger('id_mascota');
            $table->string('rut_cliente',10);

            $table->primary(['rut_cliente','id_mascota']);


            $table->foreign('id_mascota')->references('id')->on('mascotas')->onDelete('cascade');
            $table->foreign('rut_cliente')->references('rut')->on('clientes')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascota_cliente');
    }
};

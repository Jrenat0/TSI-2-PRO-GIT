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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->time('hora');
            $table->unsignedBigInteger('pesaje')->nullable();
            $table->string('observaciones',100)->nullable();
            $table->char('estado',1)->nullable(); //'T' es terminada, 'P' es pendiente.

            //Foreign Key

            $table->unsignedBigInteger('id_mascota');
            $table->foreign('id_mascota')->references('id')->on('mascotas')->onDelete('cascade');
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};

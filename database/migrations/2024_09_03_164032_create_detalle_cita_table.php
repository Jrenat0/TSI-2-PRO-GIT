<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalle_cita', function (Blueprint $table) {

            //Variables
            $table->unsignedBigInteger('id_cita');
            $table->unsignedBigInteger('id_servicio');
            $table->string('rut_usuario', 10);

            $table->foreign('id_cita')->references('id')->on('citas')->onDelete('cascade');
            $table->foreign('id_servicio')->references('id')->on('servicios')->onDelete('cascade');
            $table->foreign('rut_usuario')->references('rut')->on('usuarios')->onDelete('cascade');

            $table->unique(['id_cita', 'id_servicio'], 'detalle_cita_unique');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_cita');
    }
};

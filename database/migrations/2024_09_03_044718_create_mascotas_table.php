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
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',20);
            $table->string('raza',20);
            $table->string('sexo',1);
            $table->string('color',10);
            $table->decimal('peso', 8, 2)->nullable();
            $table->date('fecha_nacimiento')->nullable();


            //Foreign Key
            $table->string('rut_cliente',10);
            $table->foreign('rut_cliente')->references('rut')->on('clientes')->onDelete('cascade');




        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascotas');
    }
};

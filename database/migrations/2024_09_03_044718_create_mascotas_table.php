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
            $table->string('raza',50);
            $table->string('sexo',1);
            $table->string('color',50);
            $table->decimal('peso', 5, 2);
            $table->date('fecha_nacimiento');
            $table->string('imagen')->nullable();
            $table->softDeletes();
            $table->timestamps(); 

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

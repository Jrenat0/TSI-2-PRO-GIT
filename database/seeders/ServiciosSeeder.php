<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('servicios')->insert([
            ['nombre'=>'Baño','descripcion'=>'Tratamiento de ducha completa para mascotas','duracion_estimada'=>'40 mins','costo'=>20000],
            ['nombre'=>'Corte de uñas','descripcion'=>'Tratamiento de pedicura para mascotas','duracion_estimada'=>'10 mins','costo'=>10000],
            ['nombre'=>'Corte de pelo','descripcion'=>'Tratamiento de estilizacion para mascotas','duracion_estimada'=>'60 mins','costo'=>25000],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



use Illuminate\Support\Facades\DB;

class MascotasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mascotas')->insert([
            ['nombre'=>'Sparky','raza'=>'Golden Retriever','sexo'=>'M','color'=>'Dorado','peso'=>40,'fecha_nacimiento'=>Carbon::parse('2024-08-13'), 'imagen'=>'mascotas/sparky.jpg','rut_cliente'=>'21222324-k', 'created_at'=> Carbon::now()],
            ['nombre'=>'Nene','raza'=>'Chihuahua','sexo'=>'H','color'=>'Dorado','peso'=>3,'fecha_nacimiento'=>Carbon::parse('2022-12-1'),'imagen'=>'mascotas/nene.jpg','rut_cliente'=>'12345678-9', 'created_at'=> Carbon::now()],
            ['nombre'=>'Brian Griffin','raza'=>'Labrador','sexo'=>'M','color'=>'Blanco','peso'=>30,'fecha_nacimiento'=>Carbon::parse('1999-01-31'),'imagen'=>'mascotas/brian.jpg','rut_cliente'=>'87654321-0', 'created_at'=> Carbon::now()],
        ]);
    }
}

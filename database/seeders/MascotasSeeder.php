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
            ['nombre'=>'Sparky','raza'=>'Golden Retriever','sexo'=>'M','color'=>'Dorado','peso'=>40,'fecha_nacimiento'=>Carbon::parse('2024-08-13'),'rut_cliente'=>'21222324-k'],
            ['nombre'=>'Nene','raza'=>'Chihuahua','sexo'=>'F','color'=>'Dorado','peso'=>3,'fecha_nacimiento'=>Carbon::parse('2022-12-1'),'rut_cliente'=>'12345678-9'],
            ['nombre'=>'Brian Griffin','raza'=>'Labrador','sexo'=>'M','color'=>'Blanco','peso'=>30,'fecha_nacimiento'=>Carbon::parse('1999-01-31'),'rut_cliente'=>'87654321-0'],
        ]);
    }
}

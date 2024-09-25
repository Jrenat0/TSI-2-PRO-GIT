<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class DetalleCitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('detalle_cita')->insert([
            ['id_servicio'=>3,'id_cita'=>2,'rut_usuario'=>'21212121-2'],
            ['id_servicio'=>1,'id_cita'=>2,'rut_usuario'=>'21212121-2'],
        ]);
    }
}
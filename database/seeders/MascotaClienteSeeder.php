<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MascotaClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mascota_cliente')->insert([
            ['rut_cliente'=>'12345678-9', 'id_mascota' => '1'],
            ['rut_cliente'=>'87654321-0', 'id_mascota' => '2'], 
            ['rut_cliente'=>'21222324-k', 'id_mascota' => '3'],
        ]);
    }
}

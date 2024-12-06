<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;




class CitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('citas')->insert([
            ['fecha'=>Carbon::parse('2024-12-06'),'hora'=>Carbon::parse('14:30'),'hora_termino' => Carbon::parse('14:40'),'pesaje' => 20,'observaciones' => 'Sensibilidad en la piel','id_mascota'=>'1','estado' => 'P'],
            ['fecha'=>Carbon::parse('2024-12-06'),'hora'=>Carbon::parse('13:00'),'hora_termino' => Carbon::parse('14:00'),'pesaje' => 30,'observaciones' => 'Sensibilidad en la piel','id_mascota'=>'2','estado' => 'P'],

            ['fecha'=>Carbon::parse('2024-12-07'),'hora'=>Carbon::parse('14:30'),'hora_termino' => Carbon::parse('15:20'),'pesaje' => 35,'observaciones' => 'Sensibilidad en la piel','id_mascota'=>'3','estado' => 'P'],
            ['fecha'=>Carbon::parse('2024-12-07'),'hora'=>Carbon::parse('13:00'),'hora_termino' => Carbon::parse('14:00'),'pesaje' => 25,'observaciones' => 'Sensibilidad en la piel','id_mascota'=>'4','estado' => 'P'],
        ]);
    }
}

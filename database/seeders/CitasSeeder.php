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
            ['fecha'=>Carbon::parse('2024-11-28'),'hora'=>Carbon::parse('14:30'),'id_mascota'=>'1','estado' => 'P'],
            ['fecha'=>Carbon::parse('2024-11-28'),'hora'=>Carbon::parse('13:00'),'id_mascota'=>'2','estado' => 'P'],
        ]);
    }
}

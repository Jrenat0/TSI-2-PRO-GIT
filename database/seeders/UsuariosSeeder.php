<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('usuarios')->insert([
            ['rut'=>'21777777-7','nombre'=>'Joaquin','fono'=>'911112222','email'=>'joaquin1@gmail.com','password'=>Hash::make('1234'),'rol'=>'Administrador', 'created_at'=> Carbon::now()],
            ['rut'=>'21333333-3','nombre'=>'Carlita','fono'=>'933334444','email'=>'carlita2@gmail.com','password'=>Hash::make('4321'),'rol'=>'Administrador', 'created_at'=> Carbon::now()],
            ['rut'=>'21212121-2','nombre'=>'Felipe','fono'=>'913132424','email'=>'pipe@gmail.com','password'=>Hash::make('1212'),'rol'=>'Peluquero', 'created_at'=> Carbon::now()],
        ]);


    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;



class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('clientes')->insert([
            ['rut'=>'12345678-9','nombre'=>'Alberto','fono'=>'912345678','email'=>'albertito@gmail.com','direccion'=>'Los alamos 50', 'created_at'=> Carbon::now()],
            ['rut'=>'87654321-0','nombre'=>'Benjamin','fono'=>'987654321','email'=>'benja1212@gmail.com','direccion'=>'Los araucos 12', 'created_at'=> Carbon::now()],
            ['rut'=>'21222324-k','nombre'=>'Christian','fono'=>'912223444','email'=>'chris2004@gmail.com','direccion'=>'Los lagos 1000', 'created_at'=> Carbon::now()],
        ]);


        
    }
}

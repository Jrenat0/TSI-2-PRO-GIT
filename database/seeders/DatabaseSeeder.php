<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\MascotaCliente;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            ClientesSeeder::class,
            ServiciosSeeder::class,
            UsuariosSeeder::class,
            MascotasSeeder::class,
            CitasSeeder::class,
            DetalleCitaSeeder::class,
            MascotaClienteSeeder::class,
        ]);
    }
}

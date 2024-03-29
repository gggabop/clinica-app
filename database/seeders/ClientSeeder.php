<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::create([
            'name' => 'Juan',
            'lastName' => 'Pérez',
            'typeOfDocument' => 'DNI',
            'documentNumber' => '123133132',
            'email' => '222@example.com',
            'phone' => '123456789',
            'address' => 'Calle Principal 123',
            'postalCode' => '12345',
            'city' => 'Ciudad de Ejemplo',
            'estate' => 'Estado de Ejemplo',
            'country' => 'País de Ejemplo',
        ]);

        // Agrega más clientes si es necesario
    }
}

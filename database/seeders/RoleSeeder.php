<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role; 

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Puedes ajustar los nombres como desees
        $roles = [
            ['name' => 'Admin'],
            ['name' => 'Usuario'],
            // Puedes añadir más roles aquí si es necesario
        ];

        // Iteramos sobre los roles y los insertamos en la base de datos
        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $adminRole = Role::where('name', 'Admin')->first();
        $user = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'role_id' => $adminRole->id,
            'password' => bcrypt('admin@admin.com'),
        ]);
       
        $user->save();
    }
}
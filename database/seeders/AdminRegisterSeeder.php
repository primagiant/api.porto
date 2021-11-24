<?php

namespace Database\Seeders;

use App\Models\AdminUsers;
use Illuminate\Database\Seeder;

class AdminRegisterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminUsers::create([
            'name' => 'Admin Porto',
            'email' => 'superadmin@porto.id',
            'password' => bcrypt('password'),
        ]);
    }
}

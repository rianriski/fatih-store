<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //membuat seeder
        $owner = User::create([
            'name' => 'Admin',
            'email' => 'admin@role.com',
            'password' => bcrypt('admin')
        ]);

        // menentukan role
        $owner->assignRole('admin');

        $distributor = User::create([
            'name' => 'User',
            'email' => 'user@role.com',
            'password' => bcrypt('user')
        ]);

        $distributor->assignRole('user');
    }
}

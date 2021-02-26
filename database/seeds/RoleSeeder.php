<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role as ModelsRole;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //membuat role

        ModelsRole::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        ModelsRole::create([
            'name' => 'user',
            'guard_name' => 'web'
        ]);
    }
}

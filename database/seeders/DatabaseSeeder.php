<?php

// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        \App\Models\User::factory(10)->create();
        // \App\Models\Role::factory(5)->create();
        \App\Models\Place::factory(5)->create();
        \App\Models\Thing::factory(20)->create();
        \App\Models\Uses::factory(30)->create();
    }
}

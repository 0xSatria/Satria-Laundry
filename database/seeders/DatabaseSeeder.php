<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Member::factory(10)->create();
        \App\Models\Outlet::factory(10)->create();
        $this->call(UsersSeeder::class);
        \App\Models\Paket::factory(10)->create();
    }
}

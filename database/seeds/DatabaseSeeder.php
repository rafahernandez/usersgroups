<?php

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
        $this->call(TableAdminSeeder::class);
        $this->call(TableGroupSeeder::class);
        $this->call(TableUserSeeder::class);
        $this->call(TableGroupUserSeeder::class);
    }
}

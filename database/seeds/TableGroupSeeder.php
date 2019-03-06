<?php

use Illuminate\Database\Seeder;

class TableGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = ["Deutschland","España","Italia"];

        foreach ($groups as $g) {
            DB::table('groups')->insert([
                'name' => $g,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
    }
}

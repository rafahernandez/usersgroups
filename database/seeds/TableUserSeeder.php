<?php

use Illuminate\Database\Seeder;

class TableUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = ["Barcelona","Berlin","Firenze","Hamburg","Madrid","München","Roma","Sevilla","Venezia"];

        foreach ($users as $u) {
            DB::table('users')->insert([
                'name' => $u,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
    }
}

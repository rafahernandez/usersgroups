<?php

use Illuminate\Database\Seeder;

class TableGroupUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //To which group each user belongs, same order as UserSeeder
        $ug = [2,1,3,1,2,1,3,2,3];

        for($i=1;$i<=count($ug);$i++){
            DB::table('group_user')->insert([
                'group_id' => $ug[$i-1],
                'user_id' => $i,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
    }
}

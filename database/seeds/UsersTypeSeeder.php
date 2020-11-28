<?php

use Illuminate\Database\Seeder;
date_default_timezone_set("Asia/Kolkata");

class UsersTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date=date('Y-m-d H:i:s');
        DB::table('user_types')->insert([
         	'userType' => 'manager',
            'created_at' => $date,
        ]);
        DB::table('user_types')->insert([
         	'userType' => 'tech lead',
            'created_at' => $date,
        ]);
        DB::table('user_types')->insert([
         	'userType' => 'software engineer',
            'created_at' => $date,
        ]);

    }
}

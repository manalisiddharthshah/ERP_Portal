<?php

use Illuminate\Database\Seeder;
date_default_timezone_set("Asia/Kolkata");

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date=date('Y-m-d H:i:s');
        DB::table('departments')->insert([
         	'deptName' => 'service',
         	'mgrNo' => '1',
         	'location' => 'floor 1',
            'created_at' => $date,
        ]);
        DB::table('departments')->insert([
         	'deptName' => 'supply chain management',
         	'mgrNo' => '2',
         	'location' => 'floor 2',
            'created_at' => $date,
        ]);
        DB::table('departments')->insert([
         	'deptName' => 'production and quality assurance',
         	'mgrNo' => '3',
         	'location' => 'floor 3',
            'created_at' => $date,
        ]);
        DB::table('departments')->insert([
         	'deptName' => 'finance',
         	'mgrNo' => '4',
         	'location' => 'floor 4',
            'created_at' => $date,
        ]);
        DB::table('departments')->insert([
         	'deptName' => 'information technology',
         	'mgrNo' => '5',
         	'location' => 'floor 5',
            'created_at' => $date,
        ]);

    }
}

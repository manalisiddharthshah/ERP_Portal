<?php

use Illuminate\Database\Seeder;
date_default_timezone_set("Asia/Kolkata");

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date=date('Y-m-d H:i:s');
        DB::table('offices')->insert([
         	'officeName' => 'office 1',
         	'location' => 'Ahmedabad',
            'created_at' => $date,
        ]);
        DB::table('offices')->insert([
         	'officeName' => 'office 2',
         	'location' => 'Gandhinagar',
            'created_at' => $date,
        ]);
        DB::table('offices')->insert([
         	'officeName' => 'office 3',
         	'location' => 'Rajkot',
            'created_at' => $date,
        ]);
        DB::table('offices')->insert([
         	'officeName' => 'office 4',
         	'location' => 'Surat',
            'created_at' => $date,
        ]);
        DB::table('offices')->insert([
         	'officeName' => 'office 5',
         	'location' => 'Bhavnagar',
            'created_at' => $date,
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

use Faker\Provider\Barcode;
use Faker\Provider\en_US\Person;
use Faker\Provider\en_US\Address;
use Faker\Provider\Internet;
date_default_timezone_set("Asia/Kolkata");

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$date=date('Y-m-d H:i:s');
    	$faker = Faker\Factory::create();
        for ($i=1; $i <=5; $i++) { 
        	DB::table('users')->insert([
	         	'userTypeId' => '1',
	         	'deptId' => $i,
	         	'officeId' => $i,
	         	'name' => $faker->firstName,
	            'email' => $faker->freeEmail,
	            'phone' => $faker->isbn10,
	            'address' => $faker->address,
	            'admin' => '0',
	            'manager' => '1',
	            'tech_lead' => '0',
	            'software_engineer' => '0',
	            'created_at' => $date,
	            'password' => bcrypt('123456')
        	]);
    	}
    	for ($i=1; $i <=5; $i++) { 
        	DB::table('users')->insert([
	         	'userTypeId' => '2',
	         	'deptId' => $i,
	         	'officeId' => $i,
	         	'name' => $faker->firstName,
	            'email' => $faker->freeEmail,
	            'phone' => $faker->isbn10,
	            'address' => $faker->address,
	            'admin' => '0',
	            'manager' => '0',
	            'tech_lead' => '1',
	            'software_engineer' => '0',
	            'created_at' => $date,
	            'password' => bcrypt('password')
        	]);
    	}
    	for ($i=1; $i <=5; $i++) { 
        	DB::table('users')->insert([
	         	'userTypeId' => '3',
	         	'deptId' => $i,
	         	'officeId' => $i,
	         	'name' => $faker->firstName,
	            'email' => $faker->freeEmail,
	            'phone' => $faker->isbn10,
	            'address' => $faker->address,
	            'admin' => '0',
	            'manager' => '0',
	            'tech_lead' => '0',
	            'software_engineer' => '1',
	            'created_at' => $date,
	            'password' => bcrypt('Abc@123')
        	]);
    	}
    }
}
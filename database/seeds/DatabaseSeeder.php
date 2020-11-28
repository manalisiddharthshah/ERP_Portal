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
        $this->call([
	        UsersTypeSeeder::class,
	        DepartmentSeeder::class,
	        OfficeSeeder::class,
	        UsersTableSeeder::class,
    	]);
    }
}

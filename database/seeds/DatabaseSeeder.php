<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UniversitySeeder::class);
        $this->call(InstitutionSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(JobSeeder::class);
    }
}

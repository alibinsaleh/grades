<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StudentsTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(GradesTableSeeder::class);
        $this->call(ShortTheoryTableSeeder::class);
        $this->call(ShortPracticalTableSeeder::class);
        $this->call(BehaviourTableSeeder::class);
        $this->call(AdminUsersTableSeeder::class);
    }
}

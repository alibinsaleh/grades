<?php

use Illuminate\Database\Seeder;
use App\AdminUser;
class AdminUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new AdminUser();
        $admin->name = 'John Doe';
        $admin->email = 'johndoe@mail.com';
        $admin->password = bcrypt('secret');
        $admin->save();

        $admin = new AdminUser();
        $admin->name = 'Ali Almohammed Saleh';
        $admin->email = 'alibinsaleh@gmail.com';
        $admin->password = bcrypt('123456');
        $admin->save();
    }
}

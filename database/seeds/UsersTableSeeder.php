<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$5BV9n/8bIwPwceRipdaQzOLiQ8O4D.yl5dfQ6MdqHMj8ixCiX9MnO',
                'remember_token' => null,
                'nim'            => '',
                'kelas'          => '',
            ],
        ];

        User::insert($users);
    }
}
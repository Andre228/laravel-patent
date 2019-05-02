<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Автор неизвестен',
                'role' => 'user',
                'email' => 'gogogoahel371@mail.ru',
                'password' => bcrypt(Str::random(16))
            ],
            [
                'name' => 'Ivan',
                'role' => 'admin',
                'email' => 'mruzhish13@mail.ru',
                'password' => bcrypt('123456')
            ]
        ];
        DB::table('users')->insert($data);
    }
}

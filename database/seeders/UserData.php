<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Administrator',
                'username' => 'Atlas Coffee',
                'password' => bcrypt('12345678'),
                'level' => 1,
                'image' => 3,
                'email' => 'admin@email.com'

            ],
            [
                'name' => 'Supplier',
                'username' => 'Susu',
                'password' => bcrypt('12345'),
                'level' => 2,
                'image' => 3,
                'email' => 'gula@gmail.com'
            ],
            [
                'name' => 'Customer',
                'username' => 'Aliq',
                'password' => bcrypt('12345'),
                'level' => 3,
                'image' => 3,
                'email' => 'aliq@gmail.com'
            ]   
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}

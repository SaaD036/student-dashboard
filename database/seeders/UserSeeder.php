<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'first_name' => 'SaaD',
            'last_name' => 'Ibne Jamal',
            'phone' => '01771002219',
            'image' => 'https://cdn.pixabay.com/photo/2018/08/28/12/41/avatar-3637425_960_720.png',
            'email' => 'shaad036@gmail.com',
            'department' => '1',
            'password' => Hash::make('12345'),
            'is_authority' => true,
            'ip_address' => '127.0.0.1'
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'first_name' => 'SaaD',
            'last_name' => 'The Great',
            'phone' => '01983310693',
            'image' => 'https://cdn.pixabay.com/photo/2018/08/28/12/41/avatar-3637425_960_720.png',
            'email' => 'shaadjeem@gmail.com',
            'department' => '2',
            'password' => Hash::make('12345'),
            'is_authority' => false,
            'ip_address' => '127.0.0.1'
        ]);
    }
}

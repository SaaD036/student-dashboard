<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'id' => 1,
            'name' => 'Computer Science and Engineering',
            'short_form' => 'CSE',
            'faculty' => 'Faculty of Electrical and Electronic Engineering',
        ]);

        DB::table('departments')->insert([
            'id' => 2,
            'name' => 'Electrical and Electronic Engineering',
            'short_form' => 'EEE',
            'faculty' => 'Faculty of Electrical and Electronic Engineering',
        ]);

        DB::table('departments')->insert([
            'id' => 3,
            'name' => 'Mechanical Engineering',
            'short_form' => 'ME',
            'faculty' => 'Faculty of Mechanical Engineering',
        ]);

        DB::table('departments')->insert([
            'id' => 4,
            'name' => 'Civil Engineering',
            'short_form' => 'CE',
            'faculty' => 'Faculty of Civil Engineering',
        ]);

        DB::table('departments')->insert([
            'id' => 5,
            'name' => 'Naval Architecture and Marine Engineering',
            'short_form' => 'NAME',
            'faculty' => 'Faculty of Mechanical Engineering',
        ]);

        DB::table('departments')->insert([
            'id' => 6,
            'name' => 'Industrial and Production Engineering',
            'short_form' => 'IPE',
            'faculty' => 'Faculty of Mechanical Engineering',
        ]);
    }
}

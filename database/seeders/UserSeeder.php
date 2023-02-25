<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'name'=>'admin',
                'line_name'=>'ラインとは連携してません',
                'email'=>'admin@admin.com',
                'password'=>Hash::make('password123'),
                'role'=> 1
                ],
            [
                'name'=>'manager',
                'line_name'=>'ラインとは連携してません',
                'email'=>'manager@manager.com',
                'password'=>Hash::make('password123'),
                'role' => 5,
            ],
        ]);
    }
}

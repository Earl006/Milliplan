<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'status' => 'active',
            'unit' => 'tank batallion',
            'psych_eval' => 'passed',
            'deployments' => '13',
            'deployment status' => 'deployed',
            'password' => bcrypt('admin123'),
        ]);
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'doejohn@gmail.com',
            'role' => 'user',
            'status' => 'active',
            'unit' => 'Quick Reaction Force',
            'psych_eval' => 'passed',
            'deployments' => '3',
            'deployment status' => 'not deployed',
            'password' => bcrypt('john123'),
        ]);
            
    }
}

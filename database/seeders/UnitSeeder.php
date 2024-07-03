<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('units')->insert([
            'Userid' => '1',
            'unit' => 'tank batallion',
            'officers' => 'Admin',
            'psych_eval' => 'passed',
            'deployments' => '13',
            'deployment status' => 'deployed',
        ]);
        DB::table('units')->insert([
            'Userid' => '2',
            'unit' => 'Quick Reaction Force',
            'officers' => 'John Doe',
            'psych_eval' => 'passed',
            'deployments' => '3',
            'deployment status' => 'not deployed',
        ]);
    }
}

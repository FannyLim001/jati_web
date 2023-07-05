<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EditorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'fumoku',
            'email' => 'fumoku@gmail.com',
            'password' => bcrypt('fumoku'),
            'created_at'=> now(),
            'role'=>'Editor'
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'blade',
            'email' => 'blade@gmail.com',
            'password' => bcrypt('blade'),
            'created_at'=> now(),
            'role'=>'Reviewer'
        ]);
    }
}

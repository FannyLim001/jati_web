<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            [
                'jenis_status' => 'Submission',
                'role'=>'admin',
                'created_at'=> now(),
            ],
            [
                'jenis_status' => 'Direview',
                'role'=>'admin',
                'created_at'=> now(),
            ],
            [
                'jenis_status' => 'Diterima',
                'role'=>'admin',
                'created_at'=> now(),
            ],
            [
                'jenis_status' => 'Copy Editing',
                'role'=>'admin',
                'created_at'=> now(),
            ],
            [
                'jenis_status' => 'Dipublish',
                'role'=>'admin',
                'created_at'=> now(),
            ],
            [
                'jenis_status' => 'Ditolak',
                'role'=>'admin',
                'created_at'=> now(),
            ],
            [
                'jenis_status' => 'Submisi diterima',
                'role'=>'reviewer',
                'created_at'=> now(),
            ],
            [
                'jenis_status' => 'Diperlukan revisi',
                'role'=>'reviewer',
                'created_at'=> now(),
            ],
            [
                'jenis_status' => 'Submit ulang untuk review',
                'role'=>'reviewer',
                'created_at'=> now(),
            ],
            [
                'jenis_status' => 'Submit ulang ditempat lain',
                'role'=>'reviewer',
                'created_at'=> now(),
            ],
            [
                'jenis_status' => 'Submisi ditolak',
                'role'=>'reviewer',
                'created_at'=> now(),
            ],
        ];

        DB::table('status')->insert($status);
    }
}

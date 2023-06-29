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
                'jenis_status' => 'Pending',
                'created_at'=> now(),
            ],
            [
                'jenis_status' => 'Disetujui',
                'created_at'=> now(),
            ],
            [
                'jenis_status' => 'Ditolak',
                'created_at'=> now(),
            ],
        ];

        DB::table('status')->insert($status);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserProfileSeeder extends Seeder
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
                'nama' => 'Fumoku',
                'no_telp'=>'+6281013483',
                'afiliasi'=>'PCR',
                'bahasa_kerja'=>'Bahasa Indonesia',
                'gsch_id'=>'cOX5SPsAAAAJ',
                'scopus_id'=>'57330218200',
                'sinta_id'=>'6687913',
                'user_id'=>2,
                'created_at'=> now(),
            ],
            [
                'nama' => 'Blade',
                'no_telp'=>'+6289385049',
                'afiliasi'=>'PCR',
                'bahasa_kerja'=>'Bahasa Indonesia',
                'gsch_id'=>'cOX5SPsBBBBJ',
                'scopus_id'=>'57330218211',
                'sinta_id'=>'6688113',
                'user_id'=>3,
                'created_at'=> now(),
            ],
        ];

        DB::table('user_profile')->insert($status);
    }
}

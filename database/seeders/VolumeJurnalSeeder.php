<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VolumeJurnalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vol = [
            [
                'nama_volume' => 'Vol 1, No 1 (2023)',
                'desc_volume'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet fermentum urna. Duis nec eros ex. Praesent a euismod justo. Nullam dignissim, lectus sed iaculis placerat, quam odio sagittis leo, tempor porta lorem lectus sed lectus. Etiam semper, neque at mattis ultricies, dolor mi congue risus, non vehicula libero risus ac erat. Integer nec arcu augue.',
                'tanggal_volume'=> '2023-06-28',
                'created_at'=> now(),
            ],
            [
                'nama_volume' => 'Vol 1, No 2 (2023)',
                'desc_volume'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet fermentum urna. Duis nec eros ex. Praesent a euismod justo. Nullam dignissim, lectus sed iaculis placerat, quam odio sagittis leo, tempor porta lorem lectus sed lectus. Etiam semper, neque at mattis ultricies, dolor mi congue risus, non vehicula libero risus ac erat. Integer nec arcu augue.',
                'tanggal_volume'=> now(),
                'created_at'=> now(),
            ],
        ];

        DB::table('jurnal_volume')->insert($vol);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(EditorSeeder::class);
        $this->call(ReviewerSeeder::class);
        $this->call(VolumeJurnalSeeder::class);
        $this->call(UserProfileSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}

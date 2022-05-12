<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Journey;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Journey::factory()
            ->state([
                'user_id' => 1
            ])
            ->count(20)
            ->create();
    }
}

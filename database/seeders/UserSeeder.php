<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Journey;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory([
            'nik' => 1,
            'fullname' => 'Muhammad Azhari'
        ])->create();

        Journey::factory([
            'user_id' => $user->id,
            'waktu' => Carbon::createFromTime(3, 0, 0)->toTimeString()
        ])->create();

        Journey::factory([
            'user_id' => $user->id,
            'waktu' => Carbon::createFromTime(19, 0, 0)->toTimeString()
        ])->create();
    }
}

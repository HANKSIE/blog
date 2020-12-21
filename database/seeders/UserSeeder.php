<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name' => 'faker', 'email' => 'iamfaker@gmail.com', 'password' => Hash::make('iamfaker')]);
        User::factory(4)->create();
    }
}

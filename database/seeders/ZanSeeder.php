<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\User;
use App\Models\Zans;
use Illuminate\Support\Facades\DB;

class ZanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $users = User::pluck('id')->toArray();
        $blogs = Blog::pluck('id')->toArray();

        $data = [];
        foreach ($blogs as $bid) {
            $uids = $users;
            $times = $faker->numberBetween(0, count($uids) - 1);
            while ($times > 0) {
                $index = $faker->numberBetween(0, count($uids) - 1);
                $uid = array_splice($uids, $index, 1)[0];
                $data[] = [
                    'user_id' => $uid,
                    'blog_id' => $bid,
                ];
                $times--;
            }
        }
        Zans::insert($data);
    }
}

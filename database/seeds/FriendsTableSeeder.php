<?php

use Illuminate\Database\Seeder;
use App\Friend;

class FriendsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 20; $i++) {
            $friend = new Friend;
            $friend->name = $faker->name;
            $friend->birthday = $faker->date;
            $friend->phone = $faker->tollFreePhoneNumber;
            $friend->city = $faker->city;
            $friend->sex = rand(0, 1) == 0 ? 'm' : 'f';
            $friend->user_id = rand(1, 2);
            $friend->save();
        }
    }
}

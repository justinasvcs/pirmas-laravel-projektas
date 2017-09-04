<?php

use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('photos')->insert([
                [
                    'filename' => 'photo' . $i . '.jpg',
                    'friend_id' => $i
                ]
            ]);
        }
    }
}

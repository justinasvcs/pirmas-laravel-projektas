<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'John';
        $user->email = 'john@doe.com';
        $user->password = Hash::make('dronas');
        $user->save();

        $user = new User;
        $user->name = 'Annie';
        $user->email = 'annie@doe.com';
        $user->password = Hash::make('eina');
        $user->save();
    }
}

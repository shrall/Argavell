<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        $user = new User();
        $user->first_name = 'Marshall';
        $user->last_name = 'Ovierdo';
        $user->email = 'shrallvierdo@gmail.com';
        $user->username = 'shrall';
        $user->password = Hash::make('wars1234');
        $user->gender = '0';
        $user->dob = '2021-06-08';
        $user->save();
    }
}

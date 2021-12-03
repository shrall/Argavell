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
        $user->first_name = 'User';
        $user->last_name = 'Argavell';
        $user->email = 'user@argavell.com';
        $user->username = 'user_argavell';
        $user->password = Hash::make('123456789');
        $user->gender = '0';
        $user->dob = '1970-01-01';
        $user->save();

        $user = new User();
        $user->first_name = 'Admin';
        $user->last_name = 'Argavell';
        $user->email = 'admin@argavell.com';
        $user->username = 'admin';
        $user->password = Hash::make('123456789');
        $user->gender = '0';
        $user->dob = '1970-01-01';
        $user->role = '1';
        $user->save();
    }
}

<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::all()->where('email', 'pawanyogesh01@gmail.com')->first();

        if (!$user) {

            $admin = User::create([

                'name' => 'Pawan Chhangani',

                'email' => 'pawanyogesh01@gmail.com',

                'password' => Hash::make('pawan@12'),

                'role' => 'admin',

            ]);

            $admin->profile()->create([

                'avatar' => 'profile/default.jpg',

            ]);
        }
    }
}

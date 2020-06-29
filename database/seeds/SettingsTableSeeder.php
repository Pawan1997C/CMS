<?php

use App\Settings;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::create([

            'site_name' => "Laravel's Blog",

            'address' => 'Melbourne, Australia',

            'contact' => '+443215478',

            'email' => 'site@info.com',

        ]);
    }
}

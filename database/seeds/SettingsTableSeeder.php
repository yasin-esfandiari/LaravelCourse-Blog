<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'site_name' => 'laravel\'s Blog',
            'contact_number' => '8 900 7562 4844',
            'contact_email' => 'info@laravelblog.com',
            'address' => 'Russia, Petersburg'
        ]);
    }
}

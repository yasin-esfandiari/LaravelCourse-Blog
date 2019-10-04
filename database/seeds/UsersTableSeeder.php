<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'  => 'mmd esi',
            'email' => 'mmd@gmail.com',
            'password' => bcrypt('qwerty123'),
            'admin' => 1
        ]);

        Profile::create([
            'user_id' => 1,
            'avatar' => 'uploads/avatars/1.jpg',
            'about' => 'lorem ipsum ...',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com',
        ]);
    }
}

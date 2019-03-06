<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'admin',
            'password' => bcrypt('admin'),
            'email' => 'admin@laraforum.com',
            'admin' => 1,
            'avatar' => asset('avatar/avatar.png')
				]);
				
        App\User::create([
					'name' => 'Emily Myers',
					'password' => bcrypt('password'),
					'email' => 'emily@myers.com',
					'avatar' => asset('avatars/avatar.png')
			]);
    }
}

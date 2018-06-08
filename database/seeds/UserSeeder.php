<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name' => 'Manish', 'email' => 'manishsahani1351111@gmail.com'],
        ];

        foreach ($users as $user) {
             User::create([
                'name'      => $user['name'],
                'email'     => $user['email'],
                'password'  => bcrypt('password')
            ]);
        }
    }
}

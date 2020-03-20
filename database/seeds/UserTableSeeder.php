<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'name' => 'Anugrah Sandi',
            'email' => 'admin@daengweb.id',
            'password' => bcrypt('secret'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Riski Amelia',
            'email' => 'riski@daengweb.id',
            'password' => bcrypt('secret'),
            'role' => 'users'
        ]);
    }
}
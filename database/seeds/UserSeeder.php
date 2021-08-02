<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'level' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(12345678),
            'remember_token' => Str::random(50)
        ]);

        DB::table('users')->insert([
            'name' => 'kader',
            'level' => 'kader1',
            'email' => 'kader@gmail.com',
            'password' => bcrypt(12345678),
            'remember_token' => Str::random(50)
        ]);

        DB::table('users')->insert([
            'name' => 'kader lansia',
            'level' => 'kader2',
            'email' => 'kader2@gmail.com',
            'password' => bcrypt(12345678),
            'remember_token' => Str::random(50)
        ]);

        DB::table('users')->insert([
            'name' => 'Umum',
            'level' => 'umum',
            'email' => 'umum@gmail.com',
            'password' => bcrypt(12345678),
            'remember_token' => Str::random(50)
        ]);
    }
}

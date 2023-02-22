<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        $user->name = 'Md';
        $user->last_name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('12345678');
        $user->save();
        $user->assignRole('admin');


        $user = new User();
        $user->name = 'Md';
        $user->last_name = 'Moderator';
        $user->email = 'moderator@gmail.com';
        $user->password = Hash::make('12345678');
        $user->save();
        $user->assignRole('moderator');


        $user = new User();
        $user->name = 'Md';
        $user->last_name = 'Editor';
        $user->email = 'editor@gmail.com';
        $user->password = Hash::make('12345678');
        $user->save();
        $user->assignRole('editor');


        $user = new User();
        $user->name = 'Md';
        $user->last_name = 'Writer';
        $user->email = 'writer@gmail.com';
        $user->password = Hash::make('12345678');
        $user->save();
        $user->assignRole('writer');

        $user = new User();
        $user->name = 'Md';
        $user->last_name = 'User';
        $user->email = 'user@gmail.com';
        $user->password = Hash::make('12345678');
        $user->save();
        $user->assignRole('user');
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserTableSeeder extends Seeder
{

    public function run()
    {
        $arrUser = [
            [
                'name' => 'SuperAdmin',
                'email' => 'superadmin@gmail.com',
                'password' => Hash::make('123456'),
            ],

            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
            ],

            [
                'name' => 'Editor',
                'email' => 'editor@gmail.com',
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'Mohon Sarker',
                'email' => 'mohon@gmail.com',
                'password' => Hash::make('1234'),
            ]


        ];


        foreach($arrUser as $eachUser){
            $use = new User;
            $use->fill($eachUser);
            $use->save();
        }
    }
}

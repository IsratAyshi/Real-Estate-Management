<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert([

            //ADMIN

            [

                'name'=>'Admin',
                'username'=> 'admin',
                'email'=>'admin@gmail.com',
                'password'=> Hash::make('111'),
                'role'=>'admin',
                'status'=>'active',
            ],
            
            //AGENT

            [

                'name'=>'Agent',
                'username'=> 'agent',
                'email'=>'agent@gmail.com',
                'password'=> Hash::make('222'),
                'role'=>'agent',
                'status'=>'active',
            ],

            //USER

            [

                'name'=>'User',
                'username'=> 'user',
                'email'=>'user@gmail.com',
                'password'=> Hash::make('333'),
                'role'=>'user',
                'status'=>'active',
            ],

        
            
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class createTestUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(config('usertypes') as $id=>$type){
            DB::table('users')->insert([
                'name' => $type,
                'surname' => Str::random(10),
                'email' => $type.'@gmail.com',
                'nif' => Str::random(10),
                'telephone' => rand(600000000,99999999) ,
                'password' => Hash::make('123'),
                'type'=> $id
            ]);
        }
    }
}

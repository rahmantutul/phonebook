<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $adminRecords = [
           [
               'id'=>1,
               'name'=>'John',
               'email'=>'john@john.com',
               'phone'=>'01777777777',
               'avatar'=>'user.png',
               'password'=>Hash::make('john@'),
           ],
           [
               'id'=>2,
               'name'=>'Cristina',
               'email'=>'cristina@cristina.com',
               'phone'=>'01888888888',
               'avatar'=>'user.png',
               'password'=>Hash::make('cristina@'),
           ],
           
        ];

        foreach($adminRecords as $key => $records){
            \App\Models\User::create($records);
        }
        
    }
}


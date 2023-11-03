<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
            'username' => 'admin',
            'name' =>'admin',
            'surname'=>'admin',
            'department'=>'ictc',
            'check_pass'=> '123456789',
            'deleted'=> '1',
            'email' => 'admin@admin.com',
            'is_admin' => '1',
            'password' => bcrypt('123456789')
            ],
            [
            'username' => 'user',
            'name' => 'user',
            'surname'=>'user',
            'department'=>'ictc',
            'check_pass'=> '123456789',
            'deleted'=> '1',
            'email' => 'user@user.com',
            'is_admin' => '0',
            'password' => bcrypt('123456789')
            ]
        ];
        

        foreach ($user as $key => $value){
            User::create($value);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // User::truncate();
        $userdata =[
            [
            'name' => 'Hussein mohamed',
            'email' => 'admin@gmail.com',
            'is_admin' => '1',
            'password' => bcrypt('123456789')
        ],[
        'name' => 'hussein',
        'email' => 'user@gmail.com',
        'is_admin' => '0',
        'password' => bcrypt('123456789')
        ]
    ];
    foreach ($userdata as $key => $val){
        User::create($val);
    }
    }
}

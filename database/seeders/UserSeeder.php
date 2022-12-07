<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create(['name'=> 'Yoisi',
        'lastName'=> 'Mosquera',
        'document'=> '1010099403',
        'phone'=> '3117031733',
        'address'=> 'calle 68 # 95 -54',
        'email'=> 'yoisimarleida@gmail.com',
        'password' => bcrypt('123456789'),
        'status'=> '1'
        ])->assignRole('SuperAdmin');

        User::create(['name'=> 'Daniela ',
        'lastName'=> 'Moreno',
        'document'=> '85869670',
        'phone'=> '315671733',
        'address'=> 'calle 09 # 78 -54',
        'email'=> 'danielareyes@gmail.com',
        'password' => bcrypt('123456789'),
        'status'=> '1'
        ])->assignRole('Admin');

        User::create(['name'=> 'Camila',
        'lastName'=> 'Mena',
        'document'=> '13245677',
        'phone'=> '320495596',
        'address'=> 'calle 70 # 95 -54',
        'email'=> 'camila@gmail.com',
        'password' => bcrypt('123456789'),
        'status'=> '1'
        ])->assignRole('Usuario');
        


        User::factory()->create();
    }
}

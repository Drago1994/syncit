<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('contacts')->insert([
            'id' => 1,
            'firstname' => 'Drago',
            'lastname' => 'Albijanic',
        ]);

        DB::table('contacts')->insert([
            'id' => 2,
            'firstname' => 'Vlada',
            'lastname' => 'Milijic',
        ]);

        DB::table('numbers')->insert([
            'id' => 1,
            'label' => 'HOME',
            'number' => '(011) 4354 364',
            'contact_id' => 1,
        ]);

        DB::table('numbers')->insert([
            'id' => 2,
            'label' => 'MOBILE',
            'number' => '(064) 234 2345',
            'contact_id' => 1,
        ]);

        DB::table('numbers')->insert([
            'id' => 3,
            'label' => 'MOBILE',
            'number' => '(062) 8450 325',
            'contact_id' => 2,
        ]);

        DB::table('admins')->insert([
            'id' => 1,
            'username' => 'admin',
            'password' => Hash::make('admin')
        ]);

    }
}

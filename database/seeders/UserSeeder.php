<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        DB::table('users')->insert([
            'name' => 'Alexis Guzmán',
            'email' => 'alexis@test.com',
            'password' => Hash::make('password'),
            'rol' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'Oliver Quintero',
            'email' => 'oliver@test.com',
            'password' => Hash::make('password'),
            'rol' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'Mariana Quiroz',
            'email' => 'mariana@test.com',
            'password' => Hash::make('password'),
            'rol' => 'user',
        ]);

        DB::table('users')->insert([
            'name' => 'Cesar Higashi',
            'email' => 'cesar@test.com',
            'password' => Hash::make('password'),
            'rol' => 'user',
        ]);

        DB::table('users')->insert([
            'name' => 'Osvaldo Gonzalez',
            'email' => 'osvaldo@test.com',
            'password' => Hash::make('password'),
            'rol' => 'user',
        ]);
    }
}

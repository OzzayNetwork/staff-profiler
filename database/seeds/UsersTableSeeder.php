<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
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
            'name' => 'Kelvin Njuguna',
            'email' => 'kelvin@nouveta.tech',
            'password' => bcrypt('admin'),
            'is_admin'=> 1,
            'added_by' => "system",
            'title' => 'Administrator',
            'phone' => '0700123456',
            'gender' => 'male',
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'email' => 'admin@api.net',
                'password' => Hash::make('123456'),
                'name' => 'Tiago Batista'
            ]
        );
    }
}

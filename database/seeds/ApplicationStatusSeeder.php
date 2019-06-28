<?php

use Illuminate\Database\Seeder;

class ApplicationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('application_statuses')->insert([
            ['status' => 'pendente'],
            ['status' => 'processamento'],
            ['status' => 'aceito'],
            ['status' => 'rejeitado']
        ]);
    }
}

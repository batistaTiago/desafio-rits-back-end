<?php

use Illuminate\Database\Seeder;

class EnglishLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('english_levels')->insert([
            ['nivelIngles' => 'Nenhum'],
            ['nivelIngles' => 'Basico'],
            ['nivelIngles' => 'Intermediario'],
            ['nivelIngles' => 'Avançado'],
            ['nivelIngles' => 'Fluente'],
            ['nivelIngles' => 'Nativo']
        ]);
    }
}

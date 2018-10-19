<?php

use Illuminate\Database\Seeder;

class AisleSeeder extends Seeder
{
    public function run()
    {
        for($i=1; $i<21; $i++) {
            DB::table('aisles')->insert([
                'number' => $i
            ]);
        }
    }
}
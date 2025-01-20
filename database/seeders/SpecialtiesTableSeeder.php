<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialtiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('specialties')->insert([
            ['name' => 'Medicina general'],
            ['name' => 'Cirugía'],
            ['name' => 'Cardiología'],
            ['name' => 'Odontología veterinaria'],
        ]);
    }
}

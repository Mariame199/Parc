<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeVoitureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("type_voitures")->insert([
            ["nom"=>"Minibus"],
            ["nom"=>"Pick up"],
            ["nom"=>"Berlines"],
            ["nom"=>"Crossover"]
        ]);
    }
}

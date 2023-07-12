<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("permissions")->insert([
            ["nom"=>"ajouter une voiture"],
            ["nom"=>"voir une voiture"],
            ["nom"=>"modifier une voiture"],

            ["nom"=>"ajouter une location"],
            ["nom"=>"voir une location"],
            ["nom"=>"modifier une location"],

            ["nom"=>"ajouter un client"],
            ["nom"=>"voir un client"],
            ["nom"=>"modifier un client"],

        ]);
    }
}

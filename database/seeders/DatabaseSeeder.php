<?php

namespace Database\Seeders;
use App\Models\Voiture;
use App\Models\User;
use App\Models\Client;
use App\Models\Employe;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(TypeVoitureTableSeeder::class);
        Voiture::factory(10)->create();
        Client::factory(10)->create();
        User::factory(10)->create();
        Employe::factory(10)->create();

        $this->call(RoleTableSeeder::class);
        $this->call(StatutLocationTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(DureeLocationTableSeeder::class);

      // $user =User::find(1);
      // $role =Role::find(1);
      //  DB::table('user_role')->insert([
        // user_id =>$user_id,
        //  role_id =>role_id,

        //  ]);
        User::find(1)->roles()->attach(1);
        User::find(2)->roles()->attach(2);
        User::find(3)->roles()->attach(3);
        User::find(4)->roles()->attach(4);



    }
}

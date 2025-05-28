<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//use Illuminate\Database\Seeder\AdminUserSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */



  public function runs()
    {

        $this->call([
            AdminUserSeeder::class,
        ]);

    }

      public function run(): void
{
    $this->call([
        FootwearsSeeder::class,
    ]);
}




}

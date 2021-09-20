<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factory;
use Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake  = Faker\Factory::create();

        for ($i = 0; $i < 10; $i++){
            DB::table('categories')->insert([
                'name' => $fake->name,
                'description' => $fake->sentence(15),
                'created_at' => date("Y-m-d"),
                'updated_at' => date("Y-m-d")
            ]);
        }
    }
}

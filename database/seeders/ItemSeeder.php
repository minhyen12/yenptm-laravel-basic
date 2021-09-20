<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factory;
use Faker;

class ItemSeeder extends Seeder
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
            DB::table('items')->insert([
                'name' => $fake->name,
                'amount' => $fake->numerify(),
                'category_id' => $fake->numberBetween($min = 1, $max = 10),
                'created_at' => date("Y-m-d"),
                'updated_at' => date("Y-m-d")
            ]);
        }
    }
}

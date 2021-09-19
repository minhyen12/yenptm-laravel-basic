<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factory;
use Faker;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = Faker\Factory::create();
        $limit = 100;

        for($i = 0; $i <= $limit; $i++) {
            DB::table('users')->insert([
                'mail_address' => $fake->unique->email,
                'password' => Hash::make('minhyen'),
                'name' => $fake->name,
                'address' => $fake->city,
                'phone' => $fake->phoneNumber,
                'created_at' => $fake->date("Y-m-d H:i:s"),
                'updated_at' => $fake->date("Y-m-d H:i:s"),
            ]);
        }
    }
}

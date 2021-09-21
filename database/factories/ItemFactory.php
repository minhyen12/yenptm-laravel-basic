<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Faker;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker\Factory::create('vi_VN');
        return [
            'name' => $faker->name,
                'amount' => $faker->numerify(),
                'category_id' => $faker->numberBetween($min = 1, $max = 10),
                'created_at' => date("Y-m-d"),
                'updated_at' => date("Y-m-d")
        ];
    }
}

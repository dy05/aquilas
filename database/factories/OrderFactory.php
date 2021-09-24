<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

        'reference' => $this->faker->strtoupper(Str::random(8)),
        'total' => $this->faker->mt_rand (1000, 5000) / 100,
        'user_id' => $this->faker->mt_rand(1, 5),

        ];
    }
}

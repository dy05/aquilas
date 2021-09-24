<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
 factory(User::class, 5)->create();
        factory(Order::class, 30)
        ->create()
        ->each(function ($order) {
            $order->products()->createMany(
                factory(Product::class, rand(3, 8))->make()->toArray()
            );
      });    }
}

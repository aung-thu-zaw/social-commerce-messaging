<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Order;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory(10)
            ->create()
            ->each(function (Customer $customer) {
                Order::factory(fake()->numberBetween(1, 4))
                    ->for($customer)
                    ->create();
            });
    }
}

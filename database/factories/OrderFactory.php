<?php

namespace Database\Factories;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $customer = Customer::inRandomOrder()->first();

        return [
            'order_number' => 'ORD-' . fake()->unique()->numerify('#####') . '-' . fake()->unique()->bothify('??'),
            'customer_id' => $customer->id,
            'total_amount' => fake()->numberBetween(10000, 100000),
            'currency' => 'MMK',
            'status' => fake()->randomElement(OrderStatus::cases()),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Order $order) {
            $items = OrderItem::factory(fake()->numberBetween(1, 10))->create([
                'order_id' => $order->id,
            ]);

            $order->updateQuietly(['total_amount' => $items->sum('line_total')]);
        });
    }

    public function pending(): static
    {
        return $this->state(fn() => [
            'status' => OrderStatus::PENDING->value,
        ]);
    }

    public function confirmed(): static
    {
        return $this->state(fn() => [
            'status' => OrderStatus::CONFIRMED->value,
        ]);
    }

    public function processing(): static
    {
        return $this->state(fn() => [
            'status' => OrderStatus::PROCESSING->value,
        ]);
    }

    public function shipped(): static
    {
        return $this->state(fn() => [
            'status' => OrderStatus::SHIPPED->value,
        ]);
    }

    public function delivered(): static
    {
        return $this->state(fn() => [
            'status' => OrderStatus::DELIVERED->value,
        ]);
    }

    public function cancelled(): static
    {
        return $this->state(fn() => [
            'status' => OrderStatus::CANCELLED->value,
        ]);
    }
}

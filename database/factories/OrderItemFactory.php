<?php

namespace Database\Factories;

use App\Models\OrderItem;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $products = [
            'Wireless Bluetooth Earbuds',
            'Stainless Steel Water Bottle',
            'Smartphone Case',
            'Adjustable Laptop Stand',
            'Ergonomic Office Chair',
            'USB-C Charging Cable',
            'Portable Power Bank',
            'Fitness Activity Tracker',
            '4K Ultra HD TV',
            'Noise Cancelling Headphones',
            'Yoga Mat',
            'Non-stick Frying Pan',
            'Wooden Coffee Table',
            'Electric Kettle',
            'Cordless Handheld Vacuum',
            'Memory Foam Pillow',
            'LED Desk Lamp',
            'Air Purifier',
            'Backpack with USB Port',
            'Men\'s Classic Watch'
        ];

        $order = Order::inRandomOrder()->first();

        $quantity = fake()->numberBetween(1, 5);

        $price = fake()->numberBetween(1000, 10000);

        return [
            'order_id' => $order->id,
            'product_name' => fake()->randomElement($products),
            'sku' => strtoupper(fake()->bothify('SKU-####-???')),
            'quantity' => $quantity,
            'unit_price' => $price,
            'line_total' => $quantity * $price,
        ];
    }
}

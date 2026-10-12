<?php

namespace Database\Factories;

use App\Models\ChannelIdentity;
use App\Models\Customer;
use App\Enums\Channel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ChannelIdentity>
 */
class ChannelIdentityFactory extends Factory
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
            'customer_id' => $customer->id,
            'channel' => fake()->randomElement(Channel::cases()),
            'external_user_id' => fake()->unique()->numerify('#########'),
            'username' => fake()->unique()->userName(),
            'connected_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }

    public function telegram(): static
    {
        return $this->state(fn() => [
            'channel' => Channel::TELEGRAM->value,
        ]);
    }

    public function messenger(): static
    {
        return $this->state(fn() => [
            'channel' => Channel::MESSENGER->value,
        ]);
    }
}

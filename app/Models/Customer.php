<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Order;
use App\Models\ChannelIdentity;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;

    /**
     * Get the orders for the customer.
     *
     * @return HasMany<Order, $this>
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the channel identities for the customer.
     *
     * @return HasMany<ChannelIdentity, $this>
     */
    public function channelIdentities(): HasMany
    {
        return $this->hasMany(ChannelIdentity::class);
    }
}

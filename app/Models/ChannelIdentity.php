<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Customer;
use App\Enums\Channel;

class ChannelIdentity extends Model
{
    /** @use HasFactory<\Database\Factories\ChannelIdentityFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'connected_at' => 'datetime',
            'channel' => Channel::class,
        ];
    }

    /**
     * Get the customer that the channel identity belongs to.
     *
     * @return BelongsTo<Customer, $this>
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}

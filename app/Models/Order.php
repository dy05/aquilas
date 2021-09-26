<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'reference',
        'total',
        'status',
    ];

    /**
     * @return HasManyThrough
     */
    public function products(): HasManyThrough
    {
        return $this->hasManyThrough(Product::class, OrderItem::class);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

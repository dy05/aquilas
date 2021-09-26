<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_details',
        'quantity',
        'date',
        'prix_total',
        'verse',
        'rest',
    ];

    protected $casts = [
        'product_details' => 'array',
    ];

    /**
     * @return BelongsTo
     */
    public function commands(): BelongsTo
    {
        return $this->belongsTo(Command::class, 'command_id');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}

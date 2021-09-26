<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'quantity',
        'price',
        'total_price',
        'active',
        'user_id',
        'material_id',
        'product_id',
    ];

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

    /**
     * @return BelongsTo
     */
    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class, 'material_id');
    }
}

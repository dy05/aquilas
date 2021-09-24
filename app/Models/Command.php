<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Command extends Model
{
    use HasFactory;

    protected $casts = [
        'products_list' => 'array',
        'dimension' => 'array'
    ];

    protected $fillable = [
        'command_number',
        'date',
        'customer_id',
        'product_id',
        'products_list',
        'termine',
        'active',
        'dimension',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}

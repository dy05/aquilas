<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'reference',
        'total',
    ];

    public function products()
    {
        return $this->hasManyThrough(Product::class, Command::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

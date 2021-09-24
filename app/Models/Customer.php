<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property string $surname
 * @property string $full_name
 */
class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'phone_number',
        'address',
        'email',
        'password',
        'active',
    ];

    protected $appends = [
        'full_name',
    ];

    public function getFullNameAttribute()
    {
        return join(' ', [$this->name, $this->surname]);
    }
}

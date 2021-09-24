<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorie_materielle extends Model
{
    use HasFactory;
               protected $fillable = [
         'nom',
        'archive',
    ];
}

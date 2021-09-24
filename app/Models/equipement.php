<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipement extends Model
{
    use HasFactory;
             protected $fillable = [
         'nom',
        'couleur',
          'marque',
         'date',
         'detail',
         'detail',
    ];
}

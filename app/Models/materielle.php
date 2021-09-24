<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materielle extends Model
{
    use HasFactory;
             protected $fillable = [
         'nom',
        'couleur',
          'dimension',
    ];

      public function GetCategorie(){
         return $this->belongsTo(categorie_materielle::class, 'idCategorie','id' );
     } 
}

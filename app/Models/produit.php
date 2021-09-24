<?php

namespace App\Models;

use App\Models\categorie_produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class produit extends Model
{
    use HasFactory;

             protected $fillable = [
         'nom',
        'description',
          'idCategorie',
         'photo',
         'idCategorie',
         
    ];

        public function categorie()
    {
        return $this->belongsTo(categorie_produit::class,'idCategorie','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class achat extends Model
{
    use HasFactory;
                  protected $fillable = [
         
        'quantite_produit',
          'date',
         'prix_total',
         'verse',
        'reste',
    
    ];
            public function Getcommandes(){
         return $this->belongsTo(commande::class, 'idcommandes','id' );
     } 
    
          public function Getuser(){
         return $this->belongsTo(User::class, 'idUser','id' );
     } 
     public function Getproduit(){
         return $this->belongsTo(produit::class, 'idProduit','id' );
     }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sortir extends Model
{
    use HasFactory;
         protected $fillable = [
         'date',
        'quantite_sortir',
          'prix_total',
    ];

      public function Getuser(){
         return $this->belongsTo(User::class, 'idUser','id' );
     } 
     public function Getproduit(){
         return $this->belongsTo(produit::class, 'idProduit','id' );
     } 
     public function materielle(){
         return $this->belongsTo(materielle::class, 'idMaterielle','id' );
     } 
}

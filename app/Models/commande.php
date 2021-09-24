<?php

namespace App\Models;

use App\Models\produit;
use App\Models\commande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class commande extends Model
{
    use HasFactory;
// cest pour cast un string en array 
    protected $casts=[
'produit'=>'array',
'dimention'=>'array'
    ];

                  protected $fillable = [
         'numero_bon_commande',
          'date',
          
          'idClient',
    ];

         public function Getproduit(){
         return $this->belongsTo(produit::class, 'idProduit','id' );
     } 
              public function GetproduitID($id){
         $commande= produit::find($id);
         return $commande;
     } 

          public function Getclient(){
         return $this->belongsTo(client::class, 'idClient','id' );
     } 
}

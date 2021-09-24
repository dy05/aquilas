<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fiche_technique extends Model
{
    use HasFactory;
     protected $fillable = [
       'reperage',
             'designation',
              'nombre',
            'surface',
             'vis',
            'dimlong',
              'dimlarg',
             'jumbalong',
              'jumbalarg',
             'idProduit',];

     public function Getproduit(){
         return $this->belongsTo(produit::class, 'idProduit','id' );
     } 
      public function materielle(){
         return $this->belongsTo(materielle::class, 'idMaterielle','id' );
     } 
}

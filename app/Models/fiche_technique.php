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
             'product_id',];

     public function product()
     {
         return $this->belongsTo(Product::class, 'product_id', 'id');
     }
     public function materielle()
     {
         return $this->belongsTo(materielle::class, 'idMaterielle', 'id');
     }
}

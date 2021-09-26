<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facture extends Model
{
    use HasFactory;
                     protected $fillable = [
         'reference',
        'designation',
          'dimension',
         'quantite',
         'prix_unitaire',
         'montant',
         'montant_total',
                     ];

                     public function Getuser()
                     {
                         return $this->belongsTo(User::class, 'user_id', 'id');
                     }
                     public function GetAchat()
                     {
                         return $this->belongsTo(Purchase::class, 'idAchat', 'id');
                     }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contrat extends Model
{
    use HasFactory;


                  protected $fillable = [
         'payement',
        'numero',
          'date',
         'montant',
                  ];

                  public function product()
                  {
                      return $this->belongsTo(Product::class, 'product_id', 'id');
                  }
                  public function Getclient()
                  {
                      return $this->belongsTo(client::class, 'idClient', 'id');
                  }
}

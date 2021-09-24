<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historique_depence extends Model
{
    use HasFactory;
             protected $fillable = [
         'motif',
        'prix',
          
             ];
             public function Getusers()
             {
                  return $this->belongsTo(users::class, 'idUsers', 'id');
             }
}

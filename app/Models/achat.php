<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantite_produit',
        'date',
        'prix_total',
        'verse',
        'reste',
    ];

    public function commands()
    {
        return $this->belongsTo(Command::class, 'idCommands', 'id');
    }

    public function Getuser()
    {
        return $this->belongsTo(User::class, 'idUser', 'id');
    }
    public function Getproduit()
    {
        return $this->belongsTo(produit::class, 'idProduit', 'id');
    }
}

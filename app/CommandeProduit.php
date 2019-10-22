<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CommandeProduit extends Pivot
{
    //recuperer la taille du produit commande
    public function taille() {
        return $this->belongsTo('App\Taille');
    }
}

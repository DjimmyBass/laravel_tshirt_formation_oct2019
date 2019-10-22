<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    //recuperer l adresse d une commande
    public function adresse() {
        return $this->belongsTo('App\Adresse');
    }

    //recuperer l acheteur d une commande
    public function user() {
        return $this->belongsTo('App\user');

    }
    //recuprer les produits d une commande
    public function produits() {
        return $this->belongsToMany
        ('App\Produit','commande_produits')
            ->withTimestamps()
            ->using('App\CommandeProduit')
            ->withPivot('qte','prix_unitaire_ttc','prix_unitaire_ht',
                'prix_total_ht','prix_total_ttc','taille_id');

    }

}

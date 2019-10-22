<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produit extends Model

{

    use SoftDeletes;
//afficher le prix
    public function prixTTC()
    {
        return number_format($this->prix_ht * 1.2, 2);
    }
    //
    public  function prixTTCPanier() {
        return $this->prix_ht * 1.2;
    }

    public function categorie() {
        return $this->belongsTo('App\Categorie');
    }
    // recuperer les produits
    public function recommandations() {
        return $this->belongsToMany('App\Produit','produit_recommande',
            'produit_id','produit_recommande_id');
    }



    public function tags() {
        return $this->belongsToMany('App\Tag')->withTimesTamps();
    }

    //recuperer les tailles disponioble des produits
    public function tailles() {
        return $this->belongsToMany('App\Taille')
            ->withTimestamps()->withPivot('qte');
    }

}

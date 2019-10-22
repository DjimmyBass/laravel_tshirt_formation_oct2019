<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorie extends Model
{
    //recuperer les produits d une categorie
    public function produits() {
        return $this->hasMany('App\Produit');
    }
// recuperer la categorie parente d une categorie
    public function parent() {
        return $this->belongsTo('App\Categorie');
    }

    //recuperer les categories enfant d une categorie
    public function enfants() {
        return  $this->hasMany('App\Categorie', 'parent_id');
    }





}

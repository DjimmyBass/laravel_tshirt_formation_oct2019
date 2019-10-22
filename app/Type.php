<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //recupere les tailles
    public function tailles() {
        return$this->hasMany('App\Taille');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Commande;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    //
    public function index() {
        $commande = Commande::orderby('id','desc')->paginate(3);
        return view('backend.commande.index',['commandes'=>$commande]);
    }

    //afficher le detail d une commande
    public function show(Request $request) {
        $commande = Commande::find($request->id);
        return view('backend.commande.show',['commande'=>$commande]);
    }


}

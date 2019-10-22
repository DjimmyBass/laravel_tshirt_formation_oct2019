<?php

namespace App\Http\Controllers\Shop;
use App\Categorie;
use App\Http\Controllers\Controller;
use App\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    //afficher la page d accueil
    public function index() {
        //echo"Salut, homepage";
        $produits = Produit::all();

       // dd($produits);
        return view('shop.index',['produits'=>$produits]);
    }


    public function viewByCategorie(Request $request){

        $cat=Categorie::find($request->id);
//        dd($cat);
        $produit = $cat->produits;

        return view('shop.categorie',['produits'=>$produit,'cat'=>$cat ]);
    }

    public function viewByProduct(Request $request) {

        $p=Produit::find($request->id);

        return view('shop.produit',['p'=>$p,]);
    }

    public function changeSizeAjax(Request $request) {
        //recuperation de l id de taille choisi
        $taille_id = $request->taille_id;
        $produit_id = $request->produit_id;

        $produit_taille = DB::table('produit_taille')
            ->where('taille_id',$taille_id)
            ->where('produit_id',$produit_id)
            ->first();
      //  dd($produit_taille);
        return view('shop.qte_ajax',['qte'=>$produit_taille->qte]);
    }

}


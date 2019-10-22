<?php

namespace App\Http\Controllers\Backend;

use App\Categorie;
use App\Http\Controllers\Controller;
use App\Produit;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    //voir les tags
    public function index() {
        $tags = Tag::all();
        $categories = Categorie::where("parent_id",'=', null)->paginate(3);
        return view('backend.tag.index',['tags'=>$tags,'categories'=>$categories]);
    }
    //ajouter un tag
    public function add() {
        return view('backend.tag.add');

    }
// stocker un tag dans la db
    public function store(Request $request) {
        //validation du form
        $request->validate(['nom'=>'required|max:6']);
        //Creation de l objet tab
        $tag= new Tag();
        $tag->nom=$request->nom;
        //Sauvegarde dans la db
        $tag->save();
        //Redirection vers la page qui liste les tags
        return redirect()->route('backend_tags_index')
            ->with('notice','Le tag <strong>'.$tag->nom. '</strong> a bien été ajouté');

    }

    public function edit(Request $request) {
        //Récuperer dans la db le tag a modifier
        //on recupere le parametre du tag via l uri definie dans la route
        $tag = Tag::find($request->id);
       // dd($tag);
        return view('backend.tag.edit',['tag'=>$tag]);
    }
    //exécution de la modif
    public function update(Request $request) {
        $request->validate(['nom'=> 'required|max:255']);
        $tag = Tag::find($request->id);
        $tag->nom = $request->nom;
        $tag->save();
        return redirect()->route('backend_tags_index')
            ->with('notice','Le tag <strong>'.$tag->nom.'</strong> a été modifié');

    }

   //
    //public function delete(Request $request)

    //        $tag = Tag::find($request->id);
    //        $tag->delete();
    //        return redirect()->route('backend_tags_index')
    //            ->with('notice','Le tag <strong>'.$tag->nom.'</strong> a été supprimé');










}

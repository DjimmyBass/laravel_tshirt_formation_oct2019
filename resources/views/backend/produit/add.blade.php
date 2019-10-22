@extends('backend')
@section('content')

    <nav class="navbar navbar-dark fixed-top bg-red flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">MonTShirt</a>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="#">Quitter</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file"></span>
                                Produits
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="shopping-cart"></span>
                                Catégories et Tags
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="users"></span>
                                Commandes
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Ajouter un produit</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button class="btn btn-sm btn-outline-secondary">Lister les produits</button>
                        </div>
                        <button class="btn btn-sm btn-outline-secondary">
                            <span data-feather="calendar"></span>
                            Nouveau
                        </button>
                    </div>
                </div>
                <form method="POST" action="{{route('backend_produit_store')}}" enctype="multipart/form-data" method="post" >
                    @csrf
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <p>{{$error}}</p>
                            @endforeach
                        </div>
                    @endif
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nom">Nom du produit</label>
                            <input type="text" class="form-control" id="nom" name="nom">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="qte">Quantité</label>
                            <input type="text" class="form-control" id="qte" name="qte" value="{{old('qte')}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="prix_ht">PRIX H.T</label>
                            <input type="text" class="form-control" id="prix_ht" name="prix_ht" value="{{old('prix_ht')}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control" name="description" id="description" value="{{old('description')}}"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="photo_principale">Photo du produit</label>
                            <input type="file" class="form-control-file" id="photo_principale" name="photo_principale">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="category_id">Catégorie</label>
                            <select class="form-control form-control-lg" id="categorie_id" name="categorie_id">
                                @foreach($categories as $categorie)
                                    <option {{old('$categorie->') == $categorie->id ? "selected" : ""}}
                                            value="{{$categorie->id}}">{{$categorie->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tags">Tags</label>
                            <select multiple class="form-control" id="tags" name="tags[]">
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="produits_recommandes">Produits recommandés</label>
                            <select multiple class="form-control" name="produits_recommandes[]" id="produits_recommandes">
                                @foreach($produits as $produit)
                                <option value="{{$produit->id}}">{{$produit->nom}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Valider</button>
                </form>
            </main>
        </div>
    </div>

    @endsection

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
  //  return view('welcome');
//});

// Afficher la page d accueil
//use Illuminate\Routing\Route;


//use Illuminate\Routing\Route;

//use Illuminate\Routing\Route;

//use Illuminate\Routing\Route;

//use Illuminate\Routing\Route;

Route::get('/','Shop\MainController@index')->name('homepage');

// zfficher la page produits d une categoeir
Route::get('/categorie/{id}','Shop\MainController@viewByCategorie')->name('view_by_cat');

// afficher la page pour consulter le detail d un produit
Route::get('/produit/{id}','Shop\MainController@viewByProduct')->name('view_by_product');

//ajouter un produit
Route::post('/panier/add/{id}','Shop\CartController@add')->name('add_product_cart');

//modifier la quantite d un produit dasn  le panier
Route::post('/panier/update/{id}','Shop\CartController@update')->name('update_product_cart');

//pour supprimer un produit du panier
Route::get('/panier/remove/{id}','Shop\CartController@remove')->name('remove_product_cart');

//verifier qte dispo pour une taille
Route::post('/panier/qte/check','Shop\MainController@changeSizeAjax')->name('panier_qte_check');

//Lister le contenu du manier
Route::get('/panier','Shop\CartController@index')->name('cart_index');

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/mt/login', 'Auth\LoginController@loginMonTshirt')->name('login_montshirt');
Route::post('/mt/process/login', 'Auth\LoginController@loginProcess')->name('login_process_montshirt');


//route pour le process de commande
Route::get('/commande/identification','Shop\ProcessController@identification')->name('commande_identification');
Route::get('/commande/adresse','Shop\ProcessController@adresse')->name('commande_adresse');
Route::post('/commande/store/adresse','Shop\ProcessController@adresseStore')->name('commande_store_adresse');
Route::get('/commande/paiement','Shop\ProcessController@paiement')->name('commande_paiement');
Route::get('/commande/store','Shop\ProcessController@commandestore')->name('commande_store');
Route::get('/commande/merci','Shop\ProcessController@merci')->name('commande_merci');


route::middleware('auth.admin')->group(function () {
    Route::get('/backend', 'Backend\ProduitController@index')->name('backend_homepage');
    Route::get('/backend/tags', 'Backend\TagController@index')->name('backend_tags_index');
    Route::get('/backend/tags/add', 'Backend\TagController@add')->name('backend_tags_add');
    Route::post('/backend/tags/store', 'Backend\TagController@store')->name('backend_tags_store');
    Route::post('/backend/tags/update{id}', 'Backend\TagController@update')->name('backend_tags_update');
    Route::get('/backend/tags/edit/{id}', 'Backend\TagController@edit')->name('backend_tags_edit');
    Route::get('/backend/tags/delete/{id}', 'Backend\TagController@delete')->name('backend_tags_delete');
    Route::get('/backend/tags/delete/{id}', 'Backend\TagController@delete')->name('backend_tags_delete');

    Route::get('/backend/categorie/add', 'Backend\CategorieController@add')->name('backend_categorie_add');
    Route::post('/backend/categorie/store', 'Backend\CategorieController@store')->name('backend_categorie_store');
    Route::get('/backend/categorie/edit/{id}','Backend\CategorieController@edit')->name('backend_categorie_edit');
    Route::post('/backend/categorie/update/{id}','Backend\CategorieController@update')->name('backend_categorie_update');
    Route::get('/backend/categorie/delete/{id}','Backend\CategorieController@delete')->name('backend_categorie_delete');

    Route::get('/backend/produit/add', 'Backend\ProduitController@add')->name('backend_produit_add');
    Route::get('/backend/produit/edit/{id}', 'Backend\ProduitController@edit')->name('backend_produit_edit');
    Route::post('/backend/produit/update/{id}', 'Backend\ProduitController@update')->name('backend_produit_update');
    Route::post('/backend/produit/store', 'Backend\ProduitController@store')->name('backend_produit_store');

    Route::get('/backend/produit/delete/{id}','Backend\ProduitController@delete')->name('backend_produit_delete');
    Route::get('/backend/produit/add/size/{id}','Backend\ProduitController@addSize')->name('backend_produit_add_size');

    Route::post('/backend/produit/store/size/{id}','Backend\ProduitController@storeSize')->name('backend_produit_store_size');


    //Requetes Ajax
    Route::post('/backend/produit/select/size','Backend\ProduitController@selectSizeAjax')->name('backend_produit_select_size');
    Route::post('/backend/produit/remove/size','Backend\ProduitController@removeSizeAjax')->name('backend_produit_remove_size');

    Route::get('/backend/commandes','Backend\CommandeController@index')->name('backend_commandes_index');
    Route::get('/backend/commandes/{id}','Backend\CommandeController@show')->name('backend_commandes_show');


});


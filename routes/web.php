<?php

use Illuminate\Support\Facades\Route;

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


// metodo statico routes di Auth
// che importa tutte le routes per l'autenticazione
Auth::routes();


// prefix -> per mettere (admin) prima delle rotte
// namespace -> indica la cartella dove prendere i file (Admin)
// name -> serve per aggiungere il nome (admin.) per la route list
// middleware -> metodo per vedere se si è autenticati
Route::prefix('admin')->namespace('Admin')->name('admin.')->middleware('auth')->group(function () {
    
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource("posts", "PostController");
    });


// 
Route::get('/', 'HomeController@index')->name('home');


// Route per la visualizzazione dei post, in lista e singola pagina
Route::get("/blog", "PostController@index")->name("blog");
Route::get("/blog/{slug}", "PostController@show")->name("blog-page");


// Route per la visualizzazione delle categorie e dei post relativi in lista
Route::get("/categories", "CategoryController@index")->name("categories");
Route::get("/categories/{slug}", "CategoryController@show")->name("category-page");


// Route per la visualizzazione in lista dei post relativi ai tag
Route::get("/tags/{slug}", "TagController@show")->name("tag-page");


//
Route::get("/vue-posts", "PostController@vuePosts")->name("vue-posts");
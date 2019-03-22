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
/*
Route::resource('','IndexController',[
                                        'only' => ['index', 'show'],
                                        'names' => [
                                                'index'=>'home'
                                                    ],
                                        ]);
*/
Route::get('/', 'IndexController@index');
Route::get('/search', 'SearchController@index');
//admin/service
Route::group(['prefix'=>'admin'],function() {  //,'middleware'=>'auth'],function() {

    //admin
    Route::get('/', function () {
        return redirect('admin/page');
    });
    //Route::get('/',['uses'=>'Admin\PagesController@index','as'=>'index']);
    
    Route::resource('page', 'Admin\PagesController');
    //Route::get('page/{page}',['uses'=>'Admin\PagesController@index']);
    //admin/pages

    //admin/articles
    //Route::get('article/{page}',['uses'=>'Admin\ArticlesController@index','as'=>'articles']);
    Route::resource('articles', 'Admin\ArticlesController');

});



Route::get('/{articles}', 'ArticleController@index');
Route::get('/{articles}/{article}', 'ArticleController@show');

/*
Route::group(['middleware'=>'web'],function(){

    Route::match(['get'],'/',['uses'=>'IndexController@execute','as'=>'home']);
    Route::get('/page/{alias}',['uses'=>'PageController@execute','as'=>'page']);

    Route::auth();
});


*/
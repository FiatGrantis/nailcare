<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', 'IndexController@getIndex');
Route::get('/news/all', 'NewsPageController@getNews');
Route::get('/news/all/page/{page?}', 'NewsPageController@getNews');

Route::controller('/posts', 'PostsController');
Route::get('/portfolio', 'PortfolioController@getPortfolio');

Route::controller('/news', 'NewsController');

Route::controller('/comments', 'CommentsController');

Route::get('/page/{page?}', 'IndexController@getIndex');

Route::controller('/users', 'UsersController');
Route::controller('/password', 'RemindersController');

Route::get('/about', function(){
    return View::make('about');
});
Route::get('/services', function(){
    return View::make('services');
});

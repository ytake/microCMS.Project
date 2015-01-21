<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/
\Route::group(['namespace' => 'microCms\Controllers', 'before' => ['validator.middleware']], function () {

    \Route::get('/', ['uses' => 'InitializeController@index', 'as' => 'index']);
    \Route::resource('article', 'ArticleResource');
    \Route::group(['namespace' => 'Api', 'prefix' => 'api/1.0'], function () {
        \Route::resource('article', 'ArticleResource', ['only' => ['index']]);
    });
});

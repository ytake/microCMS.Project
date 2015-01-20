<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/
\Route::group(['namespace' => 'microCms\Structure\Controllers', 'before' => 'validator.middleware'], function () {

    \Route::get('/', ['uses' => 'HomeController@index', 'as' => 'index']);

    \Route::group(['namespace' => 'Api', 'prefix' => 'api/1.0'], function () {
        \Route::resource('article', 'ArticleResource', ['only' => ['index']]);
    });
});

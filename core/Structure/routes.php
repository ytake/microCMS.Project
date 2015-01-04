<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/
\Route::group(['namespace' => 'microCms\Structure\Controllers'], function () {

    \Route::get('/', ['uses' => 'HomeController@index', 'as' => 'index']);
});

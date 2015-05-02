<?php

/** @var \MicroApp\Core\Application $app */

$app->get('/about', function() use ($app) {
    return view('about');
});
$app->group(['namespace' => 'MicroApp\Http\Controllers\Managed'], function($app) {
    $app->get('/managed/login', 'AuthController@login');
});
$app->group(['namespace' => 'MicroApp\Http\Controllers\Api'], function($app) {
    $app->get('/v1/articles', 'ArticleController@articles');
});

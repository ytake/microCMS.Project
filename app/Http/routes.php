<?php

/** @var \MicroApp\Core\Application $app */
$app->get('/about', function() use ($app) {
    return view('about');
});
$app->group(['namespace' => 'MicroApp\Http\Controllers\Managed'], function($app) {
    $app->get('/managed/login', 'AuthController@login');
});

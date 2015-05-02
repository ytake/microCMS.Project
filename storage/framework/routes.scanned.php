<?php 

$router->get('/', [
	'uses' => 'MicroApp\Http\Controllers\Controller@index',
	'as' => 'index',
	'middleware' => ['setup'],
	'where' => [],
	'domain' => NULL,
]);

$router->get('setup', [
	'uses' => 'MicroApp\Http\Controllers\Controller@setup',
	'as' => 'setup',
	'middleware' => [],
	'where' => [],
	'domain' => NULL,
]);

$router->get('login', [
	'uses' => 'MicroApp\Http\Controllers\AuthController@login',
	'as' => 'auth.login',
	'middleware' => [],
	'where' => [],
	'domain' => NULL,
]);

$router->get('callback', [
	'uses' => 'MicroApp\Http\Controllers\AuthController@callback',
	'as' => 'auth.callback',
	'middleware' => [],
	'where' => [],
	'domain' => NULL,
]);

$router->get('logout', [
	'uses' => 'MicroApp\Http\Controllers\AuthController@logout',
	'as' => 'auth.logout',
	'middleware' => [],
	'where' => [],
	'domain' => NULL,
]);

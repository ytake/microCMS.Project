<?php 

$router->get('/', [
	'uses' => 'MicroApp\Http\Controllers\Controller@index',
	'as' => 'index',
	'middleware' => [],
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

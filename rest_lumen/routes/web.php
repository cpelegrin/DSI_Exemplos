<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return "Olá Mundo!!";
});

$router->get('populatedb', 'ExampleController@populateDB');

$router->get('get_names', 'ExampleController@get_names');

$router->get('get_names_and_ages', 'ExampleController@get_names_and_ages');

$router->get('get_age_by_name/{name}', 'ExampleController@get_age_by_name');

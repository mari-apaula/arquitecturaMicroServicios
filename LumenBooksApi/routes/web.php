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
/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/books', 'BookController@index');           // Listar
    $router->post('/books', 'BookController@store');          // Crear
    $router->get('/books/{book}', 'BookController@show');     // Ver uno
    $router->put('/books/{book}', 'BookController@update');   // Actualizar
    $router->patch('/books/{book}', 'BookController@update');
    $router->delete('/books/{book}', 'BookController@destroy'); // Eliminar
});
<?php

//productos
$router->get('api/productos', 'ProductoController@index');
$router->get('api/producto/{id}', 'ProductoController@find');
$router->post('api/producto', 'ProductoController@create');
$router->put('api/producto/{id}/update', 'ProductoController@update');
$router->delete('api/producto/{id}', 'ProductoController@delete');

// tiendas
$router->get('api/tiendas', 'TiendaController@index');
$router->get('api/tienda/{id}', 'TiendaController@find');
$router->post('api/tienda', 'TiendaController@create');
$router->put('api/tienda/{id}/update', 'TiendaController@update');
$router->delete('api/tienda/{id}', 'TiendaController@delete');










////// API
/// USERS
/*$router->get('api/users', 'UserController@index');
$router->get('api/users/{id}', 'UserController@find');
$router->post('api/users', 'UserController@create');
$router->post('api/users/login', 'UserController@login');
$router->put('api/users/{id}/update', 'UserController@update');

/// POSTS
$router->get('api/posts', 'PostController@index');
$router->get('api/post/{id}', 'PostController@find');
$router->post('api/post', 'PostController@create');
$router->put('api/post/{id}/update', 'PostController@update');
$router->delete('api/post/{id}', 'PostController@delete');*/
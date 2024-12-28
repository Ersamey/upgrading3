<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/pesan/(:num)', 'Home::pesan/$1');
$routes->get('/balaspesan', 'Home::balaspesan');
$routes->post('/masuk', 'Home::masuk');
$routes->post('/savebalas', 'Home::savebalas');

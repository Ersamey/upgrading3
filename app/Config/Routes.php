<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/pesan', 'Home::pesan'); // Tidak perlu ID di URL
$routes->post('/balaspesan', 'Home::balaspesan'); // Tidak perlu ID di URL
$routes->post('/masuk', 'Home::masuk');
$routes->post('/savebalas', 'Home::savebalas');

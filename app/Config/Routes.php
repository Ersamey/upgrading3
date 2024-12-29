<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/pesan', 'Home::pesan');
$routes->post('/balaspesan', 'Home::balaspesan');
$routes->post('/masuk', 'Home::masuk');
$routes->post('/savebalas', 'Home::savebalas');
$routes->get('/admin', 'Home::admin');
$routes->post('/adminmasuk', 'Home::adminmasuk');
// $routes->get('/adm/kirim', 'Home::kirim');
// $routes->post('/adm/savepesan', 'Home::savepesan');
// $routes->post('/adm/saveanak', 'Home::saveanak');
$routes->get('/addPerson', 'Home::addPerson');
// $routes->get('/adm/allpesan', 'Home::allpesan');
// $routes->post('/adm/savetanggapan', 'Home::savetanggapan');

$routes->group('adm', ['filter' => 'admin'], function($routes) {
  $routes->get('kirim', 'Home::kirim');
  $routes->get('allpesan', 'Home::allpesan');
  $routes->post('savepesan', 'Home::savepesan');
  $routes->post('saveanak', 'Home::saveanak');
  $routes->post('savetanggapan', 'Home::savetanggapan');
});
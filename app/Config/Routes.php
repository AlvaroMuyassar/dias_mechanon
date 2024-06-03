<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->add('/', 'Home::index');
$routes->add('/blog', 'Home::blog');
$routes->add('/viewblog/(:num)', 'Home::viewblog/$1');
$routes->add('/viewforum/(:num)', 'Home::viewforum/$1');
$routes->add('/forum', 'Home::forum');
$routes->add('/reply', 'Home::reply');
$routes->add('/about', 'Home::about');

$routes->add('/register', 'Home::register');
$routes->add('/insert', 'Home::insert');
$routes->add('/foruminsert', 'Home::foruminsert');
$routes->add('/login', 'Home::login');
$routes->get('/logout', 'Home::logout');
$routes->get('/image/(:num)', 'Home::showImage/$1');
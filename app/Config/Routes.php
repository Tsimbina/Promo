<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'CaisseController::index');
$routes->get('/check-caisse', 'CaisseController::checkCaisse');
$routes->get('/achat/saisie', 'AchatController::index');
$routes->post('/achat/save', 'AchatController::create');
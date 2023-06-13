<?php

namespace Config;

use App\Controllers\Admin\Home as AdminHome;
use \App\Controllers\Clients\Home as ClientHome;
use \App\Controllers\Clients\Devices as ClientDevices;
use \App\Controllers\Clients\Ports;
use CodeIgniter\Exceptions\PageNotFoundException;
// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index', ['filter' => 'noauth:home']);

$routes->group('auth', ['namespace' => 'App\Controllers\Auth'], function ($routes) {
    $routes->get('login', 'Login::index', ['as' => 'login', 'filter' => 'noauth']);
    $routes->post('check', 'Login::signin', ['as' => 'signin', 'filter' => 'noauth']);
    $routes->get('signout', 'Login::signout', ['as' => 'signout']);
    // DEFAULT
    $routes->get('', function () {
        throw PageNotFoundException::forPageNotFound();
    });
});

$routes->group('dashboard', ['filter' => 'auth'], function ($routes) {

    // SHARE
    $routes->get('home', function () {
        if (session()->get('username') == 'admin') {
            $AdminHome = new AdminHome();
            return $AdminHome->index();
        } else {
            $AdminHome = new ClientHome();
            return $AdminHome->index();
        }
    }, ['as' => 'home']);

    $routes->post('home/get', function () {
        if (session()->get('username') != 'admin') {
            $AdminHome = new ClientHome();
            return $AdminHome->get();
        } else {
            throw PageNotFoundException::forPageNotFound();
        }
    }, ['as' => 'home/get']);
    // SHARE - DEVICES
    $routes->get('devices', function () {
        if (session()->get('username') != 'admin') {
            $ClientDevices = new ClientDevices();
            return $ClientDevices->index();
        } else {
            throw PageNotFoundException::forPageNotFound();
        }
    }, ['as' => 'devices']);

    $routes->post('devices/get', function () {
        if (session()->get('username') != 'admin') {
            $ClientDevices = new ClientDevices();
            return $ClientDevices->getAll();
        } else {
            throw PageNotFoundException::forPageNotFound();
        }
    }, ['as' => 'devices/get']);

    // CLIENTS
    $routes->get('devices/ports/(:num)', function ($id) {
        if (session()->get('username') != 'admin') {
            $Ports = new Ports();
            return $Ports->index($id);
        } else {
            throw PageNotFoundException::forPageNotFound();
        }
    }, ['as' => 'ports']);

    $routes->post('devices/ports/get/(:num)', function ($id) {
        if (session()->get('username') != 'admin') {
            $Ports = new Ports();
            return $Ports->getAll($id);
        } else {
            throw PageNotFoundException::forPageNotFound();
        }
    }, ['as' => 'ports/get']);

    // DEFAULT
    $routes->get('', function () {
        throw PageNotFoundException::forPageNotFound();
    });
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

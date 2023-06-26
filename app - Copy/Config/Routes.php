<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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

$routes->addRedirect('/', '/home');
$routes->post('/chartsewa', 'Home::showchartsewa');
$routes->post('/charttotal', 'Home::showcharttotal');

$routes->get('/home', 'Home::index');

$routes->group('motor', function ($b) {

    $b->get('/', 'Motor::index');
    $b->post('/', 'Motor::cari');
    $b->get('entry', 'Motor::create');

    $b->post('entry', 'Motor::save');

    $b->get('edit/(:any)', 'Motor::edit/$1');

    $b->post('edit/(:any)', 'Motor::update/$1');

    $b->get('detail/(:any)', 'Motor::detail/$1');

    $b->delete('(:num)', 'Motor::delete/$1');
});

$routes->group('servis', function ($b) {

    $b->get('/', 'Servis::index');
    $b->post('entrys/(:num)', 'Servis::save/$1');
    $b->get('entry', 'Servis::create');
    
    // $b->post('entry', 'Servis::save');
    $b->post('/', 'Servis::addCart');
  
  

    $b->get('load', 'Servis::loadCart');
    // $u->post('edit/(:num)', 'Servis::kembalikan/$1');
    $b->delete('(:any)', 'Servis::deleteCart/$1');

    $b->get('edit/(:any)', 'Servis::edit/$1');

    $b->post('edit/(:any)', 'Servis::update/$1');

    $b->get('detail/(:any)', 'Servis::detail/$1');

    $b->delete('(:num)', 'Servis::delete/$1');
});

$routes->group('user', function ($u) {

    $u->get('/', 'User::index');

    $u->get('entry', 'User::create');

    $u->get('edit/(:any)', 'User::edit/$1');

    $u->post('edit/(:num)', 'User::update/$1');

    $u->get('detail/(:any)', 'User::detail/$1');

    $u->delete('(:num)', 'User::delete/$1');
});

$routes->group('transaksi', function ($t) {

    $t->get('/', 'Transaksi::index');

    $t->get('entry', 'Transaksi::create');

    $t->post('entry', 'Transaksi::save');

    $t->get('edit/(:any)', 'User::edit/$1');

    $t->post('edit/(:num)', 'User::update/$1');

    $t->get('detail/(:any)', 'Transaksi::detail/$1');

    $t->get('nota/(:any)', 'Transaksi::nota/$1');
    $t->post('nota/(:any)','Transaksi::exportin/$1');

    $t->delete('(:num)', 'Transaksi::delete/$1');
});

$routes->group('pengembalian', function ($u) {

    $u->get('/', 'Pengembalian::index');

    $u->get('kembalikan/(:num)', 'Pengembalian::edit/$1');

    $u->post('kembalikan/(:num)', 'Pengembalian::kembalikan/$1');
    $u->post('/', 'Pengembalian::addCart');

    $u->get('load', 'Pengembalian::loadCart');
    $u->post('edit/(:num)', 'Pengembalian::kembalikan/$1');
    $u->delete('(:any)', 'Pengembalian::deleteCart/$1');
    // $u->get('edit/(:any)', 'User::edit/$1');

    // $u->post('edit/(:num)', 'User::update/$1');

    $u->get('detail/(:any)', 'Pengembalian::detail/$1');

    $u->get('nota/(:any)', 'Pengembalian::nota/$1');
    $u->post('nota/(:any)','Pengembalian::exportin/$1');

    $u->delete('(:num)', 'Pengembalian::delete/$1');
});

$routes->group('penyewa', function ($u) {

    $u->get('/', 'Penyewa::index');

    $u->get('entry', 'Penyewa::create');

    $u->post('entry', 'Penyewa::save');

    $u->get('edit/(:any)', 'Penyewa::edit/$1');

    $u->post('edit/(:num)', 'Penyewa::update/$1');

    $u->get('detail/(:any)', 'Penyewa::detail/$1');

    $u->delete('(:num)', 'Penyewa::delete/$1');
});

$routes->group('laporan', function ($u) {

    $u->get('/', 'Laporan::index');
    $u->post('/', 'Laporan::index');

    $u->get('entry', 'User::create');

    $u->get('edit/(:any)', 'Laporan::edit/$1');
    $u->get('motor', 'Laporan::indexlaporan');
    $u->get('cetakmotor', 'Laporan::cetakmotor');
    $u->post('cetakmotorpdf', 'Laporan::cetakmotor');
    $u->post('cetak', 'Laporan::cetak');
    $u->get('cetakpdf', 'Laporan::cetakpdf');
    $u->post('cetakpdf', 'Laporan::cetakpdf');

    $u->post('edit/(:num)', 'User::update/$1');

    $u->get('detail/(:any)', 'User::detail/$1');

    $u->delete('(:num)', 'User::delete/$1');
});
// $routes->group('laporan', function ($u) {

//     $u->get('/', 'Laporan::index');

//     $u->get('entry', 'User::create');

//     $u->get('edit/(:any)', 'User::edit/$1');

//     $u->post('edit/(:num)', 'User::update/$1');

//     $u->get('detail/(:any)', 'User::detail/$1');
    

//     $u->delete('(:num)', 'User::delete/$1');
// });
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

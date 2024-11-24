<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'Login::index');


$routes->group('home', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Home::index');
});
$routes->group('perfil', ['filter' => 'auth'], function($routes) {
    $routes->get('perfil', 'Perfil::index');
});


$routes->get('menu', 'Menu::index');
$routes->get('login', 'Login::index');
$routes->get('signup', 'SignUp::index');
$routes->get('services', 'Servicios::index');
$routes->get('contact', 'Contacto::index');
$routes->get('olvidoContrasena', 'OlvidoContrasena::index');
$routes->get('blog', 'Blog::index');
$routes->get('about', 'About::index');
$routes->get('pedidos', 'Pedidos::index');
$routes->get('perfil', 'Perfil::index');
$routes->get('gestion', 'Gestion::index');
$routes->get('shopcar', 'Shopcar::index');
$routes->get('searchproducts', 'SearchProducts::index');
$routes->get('recepcionPedidos', 'RecepcionPedidos::index');
$routes->get('preparacionPedidos', 'PreparacionPedidos::index');
$routes->get('database_test', 'DatabaseTest::index');
$routes->get('productos', 'ProductoController::index');
$routes->get('paymentGetaway', 'PaymentGetaway::index');




$routes->post('register', 'SignUp::register');
$routes->post('login/authenticate', 'Login::authenticate');

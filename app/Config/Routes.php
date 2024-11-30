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
$routes->get('misPedidos/(:num)', 'Pedidos::misPedidos/$1');
$routes->post('misPedidos/cancelarPedido/(:num)', 'Pedidos::cancelarPedido/$1');
$routes->get('perfil', 'Perfil::index');
$routes->get('gestion', 'Gestion::index');
$routes->get('shopcar', 'Shopcar::index');
$routes->match(['GET', 'POST'], 'searchproducts', 'SearchProduct::searchProducts');
$routes->get('recepcionPedidos', 'RecepcionPedidos::listarPedidos');
$routes->post('recepcionPedidos/pedido/asignarChef/(:num)', 'RecepcionPedidos::asignarChef/$1');
$routes->post('recepcionPedidos/pedido/asignarDomiciliario/(:num)', 'RecepcionPedidos::asignarDomiciliario/$1');
$routes->get('preparacionPedidos/(:num)', 'PreparacionPedidos::listarPedidos/$1');
$routes->post('preparacionPedidos/pedido/terminarPreparacion/(:num)', 'PreparacionPedidos::terminarPreparacion/$1');
$routes->get('entregarPedidos/(:num)', 'EntregaPedidos::listarPedidos/$1');
$routes->post('entregarPedidos/pedido/entregarPedido/(:num)', 'EntregaPedidos::entregarPedido/$1');
$routes->get('database_test', 'DatabaseTest::index');
$routes->get('productos', 'ProductoController::index');
$routes->get('paymentGetaway', 'PaymentGetaway::index');
$routes->get('empleados', 'Employee::index');
$routes->post('empleados/register', 'Employee::register');
$routes->get('empleados/lista', 'Employee::listaEmpleados');
$routes->post('register', 'SignUp::register');
$routes->post('login/authenticate', 'Login::authenticate');
$routes->get('logout', 'Login::logout');
$routes->get('/restablecer-contrasena/(:any)', 'RestablecerContrasena::index/$1'); 
$routes->post('/restablecer-contrasena/(:any)', 'RestablecerContrasena::guardarNuevaContrasena/$1'); 
$routes->post('/restaurar-contrasena', 'OlvidoContrasena::restaurarContrasena');
$routes->post('/addToCart/(:num)', 'SearchProduct::addToCart/$1');
$routes->post('gestion', 'Gestion::agregarProducto');
$routes->post('gestion/eliminarProducto', 'Gestion::eliminarProducto');
$routes->post('gestion/editarProducto', 'Gestion::editarProducto');
$routes->get('/perfil', 'Perfil::index');
$routes->post('/perfil/guardar', 'Perfil::guardar');
$routes->post('/shopcar/confirmarPago', 'Shopcar::confirmarPago');

$routes->POST('/shopcar', 'Shopcar::eliminar');
// $routes->POST('/update-quantity', 'CarritoController::updateQuantity');

$routes->POST('/shopcar', 'Shopcar::eliminarCarrito');
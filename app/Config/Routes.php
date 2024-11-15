<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->get('home', 'Home::index');
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

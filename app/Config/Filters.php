<?php

namespace Config;

use CodeIgniter\Config\Filters as BaseFilters;
use CodeIgniter\Filters\Cors;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\ForceHTTPS;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\PageCache;
use CodeIgniter\Filters\PerformanceMetrics;
use CodeIgniter\Filters\SecureHeaders;
use App\Filters\AuthFilter; // Importar el filtro de autenticación

class Filters extends BaseFilters
{
    /**
     * Configura los alias para las clases de filtros
     * para hacer las cosas más fáciles de leer y manejar.
     *
     * @var array<string, class-string|list<class-string>>
     */
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'cors'          => Cors::class,
        'forcehttps'    => ForceHTTPS::class,
        'pagecache'     => PageCache::class,
        'performance'   => PerformanceMetrics::class,
        'auth'          => AuthFilter::class, // Aquí registras el filtro de autenticación
    ];

    /**
     * Filtros especiales requeridos.
     * 
     * @var array{before: list<string>, after: list<string>}
     */
    public array $required = [
        'before' => [
            'forcehttps', // Forzar solicitudes seguras globalmente
            'pagecache',  // Caché de página web
        ],
        'after' => [
            'pagecache',   // Caché de página web
            'performance', // Métricas de rendimiento
            'toolbar',     // Barra de herramientas de depuración
        ],
    ];

    /**
     
     *
     * @var array<string, list<string>>
     */
    public array $globals = [
        'before' => [
            'auth' => ['except' => ['login', 'signup', 'login/*', 'signup/*', 'register','SignUp/*']], 
     
        ],
        'after' => [
     
        ],
    ];
    

    /**
     * Filtros aplicados según el método HTTP.
     *
     * @var array<string, list<string>>
     */
    public array $methods = [];

    /**
     * Filtros aplicados en patrones URI específicos.
     *
     * @var array<string, array<string, list<string>>>
     */
    public array $filters = [
        ];
}

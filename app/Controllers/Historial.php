<?php

namespace App\Controllers;

use App\Models\HistorialModelo;

class Historial extends BaseController
{
    public function index(): string
    {
        $historialModel = new HistorialModelo();
        $reporteVentas = $historialModel->findAll(); // Obtiene todos los registros de la tabla

        return view('historial', ['reporteVentas' => $reporteVentas]);
    }
}

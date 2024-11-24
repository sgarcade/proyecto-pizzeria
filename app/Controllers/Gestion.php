<?php

namespace App\Controllers;
use App\Models\ProductoModel;
class Gestion extends BaseController
{
    public function index(): string
    {
        $productoModel = new ProductoModel();

        // Obtener productos con stock mayor a 10
        $productos = $productoModel->where('stock >', 10)->findAll();

        return view('gestion', ['productos' => $productos]);
    }
}
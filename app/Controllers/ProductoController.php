<?php

namespace App\Controllers;

use App\Models\ProductoModel;

class ProductoController extends BaseController
{
    public function index()
    {
        $productoModel = new ProductoModel();

        // Obtener productos con stock mayor a 10
        $productos = $productoModel->where('stock >', 10)->findAll();

        return view('producto_view', ['productos' => $productos]);
    }

}

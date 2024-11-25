<?php

namespace App\Controllers;

use App\Models\CarritoModel;
use App\Models\ProductoModel;

class CarritoController extends BaseController
{
    public function searchProducts()
    {
        if ($this->request->getMethod() === 'post') {
            $searchTerm = $this->request->getPost('search'); 

            if (empty($searchTerm)) {
                return view('searchProducts', [
                    'producto' => [],
                    'error' => 'Por favor, ingresa un término para buscar.'
                ]);
            }

           
            $productoModel = new ProductoModel();

           
            $productos = $productoModel
                ->like('nombre_producto', $searchTerm)
                ->orLike('descripcion', $searchTerm)
                ->findAll();

           
            return view('searchProducts', [
                'productos' => $productos,
                'searchTerm' => $searchTerm
            ]);
        }

        
        return view('searchProducts', ['productos' => []]);
    }
}

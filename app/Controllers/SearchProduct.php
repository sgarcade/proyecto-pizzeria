<?php

namespace App\Controllers;

use App\Models\CarritoModel;
use App\Models\ProductoModel;
use CodeIgniter\Controller;

class SearchProduct extends BaseController
{
    public function index(): string
    {
        
        return view('searchproducts');
    }

    public function searchProducts()
    {
        
        if ($this->request->getMethod() === 'post') {
            $searchTerm = $this->request->getPost('search'); 

            if (empty($searchTerm)) {
                return view('searchproducts', [
                    'producto' => [],
                    'error' => 'Por favor, ingresa un término para buscar.'
                ]);
            }

           
            $productoModel = new ProductoModel();

           
            $productos = $productoModel
                ->like('nombre_producto', $searchTerm)
                ->orLike('descripcion', $searchTerm)
                ->findAll();

           
            return view('searchproducts', [
                'productos' => $productos,
                'searchTerm' => $searchTerm
            ]);
        }

        
        return view('searchproducts', ['productos' => []]);
    }
}

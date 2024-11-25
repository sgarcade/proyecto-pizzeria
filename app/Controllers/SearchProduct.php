<?php

namespace App\Controllers;

use App\Models\CarritoModel;
use App\Models\ProductoModel;
use CodeIgniter\Controller;

class SearchProduct extends BaseController
{
    public function searchProducts()
    {
        $productoModel = new ProductoModel();

        if ($this->request->getMethod() === 'POST') {
            $searchTerm = $this->request->getPost('search'); 
            
        
            if (empty($searchTerm)) 
            {
                $productos = $productoModel->findAll();
            } 
            else
             {
        
                $productos = $productoModel
                    ->like('nombre_producto', $searchTerm)
                    ->orLike('descripcion', $searchTerm)
                    ->findAll();
            }

            return view('searchproducts',
             [
                'productos' => $productos,
                'searchTerm' => $searchTerm
            ]);
        }

        
        $productos = $productoModel->findAll();
        return view('searchproducts', ['productos' => $productos]);
    }
}

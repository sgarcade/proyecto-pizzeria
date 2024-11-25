<?php

namespace App\Controllers;
use App\Models\CarritoModel;
use CodeIgniter\Controller;

class Shopcar extends Controller
{
    public function index()
    {
        
        $usuarioId = session()->get('usuario')['id_usuario'];
                
        $carritoModel = new CarritoModel();
                
        $carrito = $carritoModel->getProductosCarrito($usuarioId);
                
        $total = $carritoModel->getTotalCarrito($usuarioId);
        
        return view('shopcar', ['shopcar' => $carrito, 'total' => $total]);
    }

    public function agregar()
    {

        $usuarioId = session()->get('usuario')['id_usuario'];
        $productoId = $this->request->getPost('producto_id');
        $cantidad = $this->request->getPost('cantidad');
        $precio = $this->request->getPost('precio');

        $carritoModel = new CarritoModel();
        $carritoModel->agregarAlCarrito($usuarioId, $productoId, $cantidad, $precio);

        return redirect()->to('/carrito');
    }
}
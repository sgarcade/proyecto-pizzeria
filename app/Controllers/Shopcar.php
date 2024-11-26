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

        return view('shopcar', [
            'shopcar' => $carrito['productos'],
            'total' => $carrito['total'],
           'cantidad_total' => $carrito['cantidad_total']   //CORRECCION
        ]);
    }

    
    public function agregar()
    {
        $usuarioId = session()->get('usuario')['id_usuario'];
        $productoId = $this->request->getPost('producto_id');
        $cantidad = $this->request->getPost('cantidad');
        $precio = $this->request->getPost('precio');

        $subtotal = $cantidad * $precio;

        $carritoModel = new CarritoModel();

        $db = \Config\Database::connect();
        $builder = $db->table('carrito');
        $carrito = $builder->where('id_cliente', $usuarioId)->get()->getRowArray();

        if (!$carrito) {
            $carritoId = $carritoModel->insert([
                'id_cliente' => $usuarioId,
                'total' => 0, 
                'fecha' => date('Y-m-d H:i:s')
            ]);
        } else {
            $carritoId = $carrito['id_carrito'];
        }

        $detalleBuilder = $db->table('carrito_detalle');
        $detalleBuilder->insert([
            'id_carrito' => $carritoId,
            'id_producto' => $productoId,
            'cantidad' => $cantidad,
            'subtotal' => $subtotal
        ]);

        $totalData = $carritoModel->getTotalCarrito($carritoId);
        $builder->where('id_carrito', $carritoId)
                ->update(['total' => $totalData['total']]);

        return redirect()->to('/carrito');
    }
}

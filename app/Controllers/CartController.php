<?php

namespace App\Controllers;

use App\Models\CarritoModel;
use App\Models\ProductoModel;

class CarritoController extends BaseController
{
    public function index()
    {
        $carritoModel = new CarritoModel();
        $carrito = $carritoModel
            ->join('producto', 'producto.id_producto = carrito.id_producto')
            ->select('carrito.*, producto.nombre_producto, producto.precio_base')
            ->findAll();

        return view('carrito/index', ['carrito' => $carrito]);
    }

    public function agregar()
    {
        $carritoModel = new CarritoModel();
        $productoModel = new ProductoModel();

        $idProducto = $this->request->getPost('id_producto');
        $cantidad = $this->request->getPost('cantidad');

        $producto = $productoModel->find($idProducto);
        $precioTotal = $producto['precio_base'] * $cantidad;

        $data = [
            'id_usuario'   => session()->get('id_usuario'),
            'id_producto'  => $idProducto,
            'cantidad'     => $cantidad,
            'precio_total' => $precioTotal
        ];

        $carritoModel->insert($data);
        return redirect()->to('/carrito')->with('success', 'Producto agregado al carrito.');
    }

    public function eliminar($idCarrito)
    {
        $carritoModel = new CarritoModel();
        $carritoModel->delete($idCarrito);

        return redirect()->to('/carrito')->with('success', 'Producto eliminado del carrito.');
    }

    public function vaciar()
    {
        $carritoModel = new CarritoModel();
        $carritoModel->where('id_usuario', session()->get('id_usuario'))->delete();

        return redirect()->to('/carrito')->with('success', 'Carrito vaciado.');
    }
}

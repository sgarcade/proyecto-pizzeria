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
            'shopcar' => $carrito['productos'] ?? [],
            'total' => $carrito['total'] ?? 0,
            'cantidad_total' => $carrito['cantidad_total'] ?? 0
        ]);
    }

    public function eliminar()
    {
        $id_producto = $this->request->getPost('id_producto');
        $usuarioId = session()->get('usuario')['id_usuario'];

        if (!$usuarioId || !$id_producto) {
            return redirect()->to('/shopcar')->with('error', 'Usuario o producto no válidos.');
        }

        $carritoModel = new CarritoModel();

        $carritoId = $carritoModel->getCarritoIdByUsuario($usuarioId);

        if (!$carritoId) {
            return redirect()->to('/shopcar')->with('error', 'Carrito no encontrado.');
        }

        $carritoModel->eliminarProducto($id_producto, $carritoId);

        $totalData = $carritoModel->getTotalCarrito($carritoId);
        $carritoModel->actualizarTotalCarrito($carritoId, $totalData['total']);

        session()->setFlashdata('success', 'Producto eliminado.');
        return $this->index(); 
    }

    public function agregar()
    {
        $usuarioId = session()->get('usuario')['id_usuario'];
        $productoId = $this->request->getPost('producto_id');
        $cantidad = (int) $this->request->getPost('cantidad');
        $precio = (float) $this->request->getPost('precio');

        if (!$usuarioId || !$productoId || $cantidad <= 0 || $precio <= 0) {
            return redirect()->to('/carrito')->with('error', 'Datos inválidos.');
        }

        $carritoModel = new CarritoModel();

        $carritoId = $carritoModel->getCarritoIdByUsuario($usuarioId);

        if (!$carritoId) {
            $carritoId = $carritoModel->crearCarrito($usuarioId);
        }

        $subtotal = $cantidad * $precio;
        $carritoModel->agregarProducto($carritoId, $productoId, $cantidad, $subtotal);

        $totalData = $carritoModel->getTotalCarrito($carritoId);
        $carritoModel->actualizarTotalCarrito($carritoId, $totalData['total']);

        return redirect()->to('/carrito')->with('success', 'Producto agregado al carrito.');
    }
}
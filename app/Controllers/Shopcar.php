<?php
namespace App\Controllers;

use App\Models\CarritoModel;
use App\Models\PedidoModel;
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

    public function agregar(): RedirectResponse
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

    public function confirmarPago()
    {
        if (!session()->has('usuario')) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión primero.');
        }
    
        $usuarioId = session()->get('usuario')['id_usuario'];
        $barrio = $this->request->getPost('barrio');
        $id_tienda = null;
    
        switch($barrio) {
            case 'El Retiro':
            case 'Rosales':
            case 'Chapinero Alto':
                $id_tienda = 1;
                break;
            case 'Villa Maria':
            case 'Altos de Suba':
            case 'Rincón de Suba':
                $id_tienda = 2;
                break;
            case 'Castilla':
            case 'Timiza':
            case 'El Tintal':
                $id_tienda = 3;
                break;
            default:
                return redirect()->to('/shopcar')->with('error', 'Barrio no válido.');
        }
    
        $metodo_pago = $this->request->getPost('payment_method');
        if (!$metodo_pago) {
            return redirect()->to('/shopcar')->with('error', 'Debe seleccionar un método de pago.');
        }

        $carritoModel = new CarritoModel();
        $pedidoModel = new PedidoModel();
    
        $carrito = $carritoModel->getProductosCarrito($usuarioId);
    
        if (empty($carrito['productos'])) {
            return redirect()->to('/shopcar')->with('error', 'El carrito está vacío.');
        }
    
        $pedidoData = [
            'id_cliente' => $usuarioId,
            'estado' => 'Pendiente',
            'fecha' => date('Y-m-d H:i:s'),
            'total' => $carrito['total'],
            'metodo_pago' => $metodo_pago,
            'id_tienda' => $id_tienda
        ];
    
       
            $pedidoId = $pedidoModel->crearPedido($pedidoData);

            $detalles = [];
            foreach ($carrito['productos'] as $producto) {
                $detalles[] = [
                    'id_producto' => $producto['id_producto'],
                    'cantidad' => $producto['cantidad'],
                    'precio_unitario' => $producto['subtotal']
                ];
            }


        $pedidoModel->agregarDetallePedido($detalles, $pedidoId);
        


        $carritoModel->eliminarCarrito($usuarioId);
    
        return redirect()->to('shopcar')->with('message', 'Producto agregado al carrito.');
      
    }
    
    
    

   
}
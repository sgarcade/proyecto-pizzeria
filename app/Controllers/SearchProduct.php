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

            if (empty($searchTerm)) {
                $productos = $productoModel->findAll();
            } else {
                $productos = $productoModel
                    ->like('nombre_producto', $searchTerm)
                    ->orLike('descripcion', $searchTerm)
                    ->findAll();
            }

            return view('searchproducts', [
                'productos' => $productos,
                'searchTerm' => $searchTerm
            ]);
        }

        $productos = $productoModel->findAll();
        return view('searchproducts', ['productos' => $productos]);
    }

    public function addToCart($id_producto)
    {
        $productoModel = new ProductoModel();
        $carritoModel = new CarritoModel();

        $id_cliente = session()->get('usuario')['id_usuario'];

        $db = \Config\Database::connect();
        $usuarioTable = $db->table('usuario');
        $usuario = $usuarioTable->where('id_usuario', $id_cliente)->get()->getRowArray();

        if (!$usuario) {
            return redirect()->to('/searchproducts')->with('error', 'El usuario no existe. Por favor, regístrese primero.');
        }

        $producto = $productoModel->find($id_producto);

        if ($producto) {
            // Verificar si el carrito ya existe para el usuario
            $carritoExistente = $carritoModel->where('id_cliente', $id_cliente)->first();

            // Si no existe el carrito, crearlo
            if (!$carritoExistente) {
                $carritoModel->insert([
                    'id_cliente' => $id_cliente,
                    'total' => 0,
                    'fecha' => date('Y-m-d H:i:s')
                ]);
                $carritoId = $carritoModel->insertID(); // Obtener el ID del carrito recién creado
            } else {
                $carritoId = $carritoExistente['id_carrito'];
            }

            $builder = $db->table('carrito_detalle');

            // Verificar si el producto ya está en el carrito
            $productoCarrito = $builder
                ->where('id_carrito', $carritoId)
                ->where('id_producto', $id_producto)
                ->get()
                ->getRowArray();

            if ($productoCarrito) {
                // Si el producto ya está en el carrito, incrementar la cantidad
                $nuevaCantidad = $productoCarrito['cantidad'] + 1;
                $builder->where('id_carrito', $carritoId)
                        ->where('id_producto', $id_producto)
                        ->update([
                            'cantidad' => $nuevaCantidad,
                            'subtotal' => $nuevaCantidad * $producto['precio_base']
                        ]);
            } else {
                // Si el producto no está en el carrito, insertarlo
                $builder->insert([
                    'id_carrito' => $carritoId,
                    'id_producto' => $id_producto,
                    'cantidad' => 1,
                    'subtotal' => $producto['precio_base']
                ]);
            }

            // Actualizar el total del carrito
            $productosCarrito = $builder
                ->where('id_carrito', $carritoId)
                ->get()
                ->getResultArray();

            $total = 0;
            foreach ($productosCarrito as $item) {
                $total += $item['subtotal'];
            }

            $carritoModel->update($carritoId, ['total' => $total]);

            return redirect()->to('/searchproducts')->with('message', 'Producto agregado al carrito.');
        }

        return redirect()->to('/searchproducts')->with('error', 'Producto no encontrado.');
    }

    public function eliminarProducto($id_producto)
    {
        $id_cliente = session()->get('usuario')['id_usuario'];
        $db = \Config\Database::connect();
        $builder = $db->table('carrito_detalle');
    
        // Verificar si el producto existe en el carrito
        $productoCarrito = $builder
            ->where('id_cliente', $id_cliente)
            ->where('id_producto', $id_producto)
            ->get()
            ->getRowArray();
    
        if ($productoCarrito) {
            // Eliminar el producto del carrito
            $builder->where('id_producto', $id_producto)->delete();
    
            // Actualizar el total del carrito después de eliminar el producto
            $carritoModel = new CarritoModel();
            $carritoExistente = $carritoModel->where('id_cliente', $id_cliente)->first();
    
            if ($carritoExistente) {
                $carritoId = $carritoExistente['id_carrito'];
                $productosCarrito = $builder
                    ->where('id_carrito', $carritoId)
                    ->get()
                    ->getResultArray();
    
                $total = 0;
                foreach ($productosCarrito as $item) {
                    $total += $item['subtotal'];
                }
    
                $carritoModel->update($carritoId, ['total' => $total]);
            }
    
            // Mostrar mensaje de éxito directamente en la misma vista sin redirigir
            return view('searchproducts', ['message' => 'Producto eliminado del carrito.']);
        }
    
        // Si el producto no estaba en el carrito, mostrar mensaje de error
        return view('searchproducts', ['error' => 'Producto no encontrado en el carrito.']);
    }
}

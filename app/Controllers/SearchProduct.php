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
            $carritoExistente = $carritoModel->where('id_cliente', $id_cliente)->first();
    
            if (!$carritoExistente) {
                $carritoId = $carritoModel->insert([
                    'id_cliente' => $id_cliente,
                    'total' => 0,
                    'fecha' => date('Y-m-d H:i:s')
                ]);
            } else {
                $carritoId = $carritoExistente['id_carrito'];
            }
    
            $builder = $db->table('carrito_detalle');
    
            $productoCarrito = $builder
                ->where('id_carrito', $carritoId)
                ->where('id_producto', $id_producto)
                ->get()
                ->getRowArray();
    
            if ($productoCarrito) {
                $nuevaCantidad = $productoCarrito['cantidad'] + 1;
                $builder->where('id_carrito', $carritoId)
                        ->where('id_producto', $id_producto)
                        ->update([
                            'cantidad' => $nuevaCantidad,
                            'subtotal' => $nuevaCantidad * $producto['precio_base']
                        ]);
            } else {
                $builder->insert([
                    'id_carrito' => $carritoId,
                    'id_producto' => $id_producto,
                    'cantidad' => 1,
                    'subtotal' => $producto['precio_base']
                ]);
            }
    
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
    
    
}


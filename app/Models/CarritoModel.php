<?php

namespace App\Models;

use CodeIgniter\Model;

class CarritoModel extends Model
{
    protected $table = 'carrito';
    protected $primaryKey = 'id_carrito';
    protected $allowedFields = ['id_cliente', 'total', 'fecha'];

    public function getProductosCarrito($id_usuario)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('carrito');
        
        $carrito = $builder->where('id_cliente', $id_usuario)->get()->getResultArray();

        if (empty($carrito)) {
            return [];
        }

        $id_carrito = $carrito[0]['id_carrito'];

        $detallesCarrito = $this->getTotalCarrito($id_carrito);
       
        return [
            'productos' => $detallesCarrito['productos'], 
            'total' => $detallesCarrito['total'],
            'cantidad_total' => $detallesCarrito['cantidad_total']
        ];
    }

    public function getTotalCarrito($id_carrito)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('carrito_detalle');
    
        // Selección con join para obtener información de productos
        $builder->select('carrito_detalle.*, producto.nombre_producto as nombre_producto, producto.precio_base as precio_unitario');
        $builder->join('producto', 'carrito_detalle.id_producto = producto.id_producto');
        $builder->where('id_carrito', $id_carrito);
        $productos = $builder->get()->getResultArray();
    
        // Obtener totales
        $builder->selectSum('cantidad', 'cantidad_total');
        $builder->selectSum('subtotal', 'total');
        $builder->where('id_carrito', $id_carrito);
        $result = $builder->get()->getRowArray();
        return [
            'productos' => $productos,       
            'total' => $result['total'] ?? 0,
            'cantidad_total' => $result['cantidad_total'] ?? 0
        ];
    }

    public function getCarritoIdByUsuario($id_usuario)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('carrito');
        $carrito = $builder->where('id_cliente', $id_usuario)->get()->getRowArray();
        
        return $carrito ? $carrito['id_carrito'] : null;
       
    }

    public function actualizarTotalCarrito($id_carrito, $nuevoTotal)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('carrito');
        $builder->where('id_carrito', $id_carrito)
                ->update(['total' => $nuevoTotal]);
               
    }
    public function eliminarProducto($id_producto, $id_carrito)
    {
        
        $db = \Config\Database::connect();
        $builder = $db->table('carrito_detalle');
        
        // Ejecutar la eliminación del producto del carrito
        $builder->where('id_producto', $id_producto)
                ->where('id_carrito', $id_carrito)
                ->delete();
                                         
               
    }       


    public function agregarDetallePedido($detalles)
    {
        // Insertar todos los detalles del pedido en la tabla 'pedido_detalle'
        $this->db->table('pedido_detalle')->insertBatch($detalles);
    }
    

    //  /**
    //  * Crear un nuevo pedido
    //  */
    // public function crearPedido($dataPedido)
    // {
    //     $db = \Config\Database::connect();
    //     $builder = $db->table('pedido');
    //     return $builder->insert($dataPedido);
    // }

    // /**
    //  * Agregar detalles del pedido
    //  */
    // public function agregarDetallePedido($detalles)
    // {
    //     $db = \Config\Database::connect();
    //     $builder = $db->table('pedido_detalle');
    //     return $builder->insertBatch($detalles);
    // }

    // /**
    //  * Eliminar carrito después de confirmar el pedido
    //  */
    // public function eliminarCarrito($id_usuario)
    // {
    //     $db = \Config\Database::connect();
    //     $builder = $db->table('carrito');
    //     $builder->where('id_cliente', $id_usuario)->delete();
    // }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class CarritoModel extends Model
{
    protected $table = 'carrito'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id_carrito'; // Clave primaria del carrito
    protected $allowedFields = [
        'id_carrito', 'producto_id', 'usuario_id', 'cantidad', 'precio'
    ]; // Campos permitidos para operaciones

    // Método para obtener los productos del carrito del usuario
    public function getProductosCarrito($usuarioId)
    {
        // Devuelve los productos del carrito para el usuario específico
        return $this->where('usuario_id', $usuarioId)->findAll();
    }

    // Método para agregar productos al carrito
    public function agregarAlCarrito($usuarioId, $productoId, $cantidad, $precio)
    {
        // Verifica si el producto ya existe en el carrito
        $productoEnCarrito = $this->where('usuario_id', $usuarioId)
                                   ->where('producto_id', $productoId)
                                   ->first();

        if ($productoEnCarrito) {
            // Si el producto ya está en el carrito, se actualiza la cantidad
            $productoEnCarrito['cantidad'] += $cantidad; // Aumenta la cantidad
            return $this->update($productoEnCarrito['id_carrito'], $productoEnCarrito); // Actualiza el carrito
        } else {
            // Si el producto no está en el carrito, se agrega como nuevo
            $data = [
                'producto_id' => $productoId,
                'usuario_id' => $usuarioId,
                'cantidad' => $cantidad,
                'precio' => $precio
            ];

            return $this->insert($data); // Inserta el nuevo producto al carrito
        }
    }

    // Método para eliminar un producto del carrito
    public function eliminarDelCarrito($usuarioId, $productoId)
    {
        // Elimina el producto del carrito del usuario
        return $this->where('usuario_id', $usuarioId)
                    ->where('producto_id', $productoId)
                    ->delete();
    }

    // Método para obtener el precio de un producto (similar a ProductoModel)
    public function getPrecioProducto($productoId)
    {
        $productoModel = new ProductoModel();
        $producto = $productoModel->find($productoId); // Obtiene el producto por su ID
        return $producto ? $producto['precio_base'] : 0; // Retorna el precio base
    }

    // Método para obtener el total del carrito de un usuario
    public function getTotalCarrito($usuarioId)
    {
        // Obtiene todos los productos del carrito del usuario
        $productosCarrito = $this->where('usuario_id', $usuarioId)->findAll();

        $total = 0;
        foreach ($productosCarrito as $producto) {
            $total += $producto['precio'] * $producto['cantidad']; // Calcula el total
        }

        return $total;
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class CarritoModel extends Model
{
    protected $table = 'carrito';
    protected $primaryKey = 'id_carrito';
    protected $allowedFields = ['id_carrito', 'producto_id', 'usuario_id', 'cantidad', 'precio'];

    public function getProductosCarrito($usuarioId)
    {
                
        return $this->where('usuario_id', $usuarioId)->findAll();
    }

    public function getTotalCarrito($usuarioId)
    {
        $productosCarrito = $this->where('usuario_id', $usuarioId)->findAll();
        $total = 0;
        foreach ($productosCarrito as $producto) {
            $total += $producto['precio'] * $producto['cantidad'];
        }
        return $total;
    }

}
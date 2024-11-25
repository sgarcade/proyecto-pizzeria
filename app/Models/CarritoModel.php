<?php

namespace App\Models;

use CodeIgniter\Model;

class CarritoModel extends Model
{
    protected $table = 'carrito';
    protected $primaryKey = 'id_carrito';
    protected $allowedFields = ['id_carrito', 'id_cliente', 'total', 'fecha'];

    public function getProductosCarrito($usuarioId)
    {
                
        return $this->where('id_cliente', $usuarioId)->findAll();
    }

    public function getTotalCarrito($usuarioId)
    {
        $productosCarrito = $this->where('id_cliente', $usuarioId)->findAll();
        $total = 0;
        foreach ($productosCarrito as $producto) {
            $total += $producto['total'] * 2;//* $producto['cantidad'];
        }
        return $total;
    }

}
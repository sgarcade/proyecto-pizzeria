<?php

namespace App\Models;

use CodeIgniter\Model;

class CarritoModel extends Model
{
    protected $table = 'carrito';
    protected $primaryKey = 'id_carrito';
    protected $allowedFields = ['id_cliente', 'total', 'fecha'];

    public function getProductosCarrito($id_carrito)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('carrito_producto');
        return $builder->where('id_carrito', $id_carrito)->get()->getResultArray();
    }
}

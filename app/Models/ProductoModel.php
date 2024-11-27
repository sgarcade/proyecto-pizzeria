<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table = 'producto';
    protected $primaryKey = 'id_producto';
    protected $allowedFields = [
        'id_producto', 'nombre_producto', 'descripcion', 'sabor', 
        'precio_base', 'stock'
    ]; 
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table = 'producto'; // Nombre de la tabla
    protected $primaryKey = 'id_producto'; // Clave primaria
    protected $allowedFields = [
        'id_producto', 'nombre_producto', 'descripcion', 'sabor', 
        'precio_base', 'stock', 'id_tamaño'
    ]; // Campos permitidos para operaciones
}

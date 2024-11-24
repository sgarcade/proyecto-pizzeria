<?php

namespace App\Models;

use CodeIgniter\Model;

class CarritoModel extends Model
{
    protected $table      = 'carrito';
    protected $primaryKey = 'id_carrito';

    protected $allowedFields = [
        'id_usuario',
        'id_producto',
        'cantidad',
        'precio_total'
    ];

    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $createdField  = 'fecha_creacion';
    protected $updatedField  = 'fecha_actualizacion';
}

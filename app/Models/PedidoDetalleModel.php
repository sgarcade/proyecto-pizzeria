<?php

namespace App\Models;

use CodeIgniter\Model;

class PedidoDetalleModel extends Model
{
    protected $table = 'pedido_detalle'; // Nombre de la tabla
    protected $primaryKey = 'id_pedido_detalle'; // Clave primaria

    // Campos permitidos para operaciones de escritura
    protected $allowedFields = [
        'id_pedido',
        'id_producto',
        'cantidad',
        'precio_unitario'
    ];

    // Habilitar timestamps si los campos 'created_at' y 'updated_at' existen
    protected $useTimestamps = true;
    protected $createdField = 'created_at'; 
    protected $updatedField = 'updated_at'; 

    // Validaciones (opcional)
    protected $validationRules = [
        'id_pedido'    => 'required|numeric',
        'id_producto'  => 'required|numeric',
        'cantidad'     => 'required|numeric',
        'precio_unitario' => 'required|decimal',
    ];

    protected $validationMessages = [
        'id_pedido' => [
            'required' => 'El ID del pedido es obligatorio.',
            'numeric'  => 'El ID del pedido debe ser numérico.'
        ],
        'id_producto' => [
            'required' => 'El ID del producto es obligatorio.',
            'numeric'  => 'El ID del producto debe ser numérico.'
        ],
        'cantidad' => [
            'required' => 'La cantidad es obligatoria.',
            'numeric'  => 'La cantidad debe ser un valor numérico.'
        ],
        'precio_unitario' => [
            'required' => 'El precio unitario es obligatorio.',
            'decimal'  => 'El precio unitario debe ser un valor decimal válido.'
        ],
    ];
}

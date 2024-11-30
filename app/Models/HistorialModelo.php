<?php

namespace App\Models;

use CodeIgniter\Model;

class HistorialModelo extends Model
{
    protected $table = 'reporte_ventas';
    protected $primaryKey = 'id_reporte';
    protected $allowedFields = ['id_pedido_detalle', 'fecha', 'cantidad', 'precio_unitario', 'total'];

   



}



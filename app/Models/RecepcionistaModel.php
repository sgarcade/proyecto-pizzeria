<?php

namespace App\Models;

use CodeIgniter\Model;

class RecepcionistaModel extends Model
{
    protected $table = 'recepcionista';
    protected $primaryKey = 'id_recepcionista';
    protected $allowedFields = ['id_usuario'];
    protected $useTimestamps = false;
    protected $returnType = 'array';

    // Relación con la tabla usuario
    public function getRecepcionistaByUserId($id_usuario)
    {
        return $this->where('id_usuario', $id_usuario)->first();
    }
}

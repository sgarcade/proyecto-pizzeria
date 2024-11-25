<?php

namespace App\Models;

use CodeIgniter\Model;

class DomiciliarioModel extends Model
{
    protected $table = 'domiciliario';
    protected $primaryKey = 'id_domiciliario';
    protected $allowedFields = ['id_usuario'];
    protected $useTimestamps = false;
    protected $returnType = 'array';

    // Relación con la tabla usuario
    public function getDomiciliarioByUserId($id_usuario)
    {
        return $this->where('id_usuario', $id_usuario)->first();
    }
}

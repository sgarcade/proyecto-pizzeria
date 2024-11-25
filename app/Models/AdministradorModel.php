<?php

namespace App\Models;

use CodeIgniter\Model;

class AdministradorModel extends Model
{
    protected $table = 'administrador';
    protected $primaryKey = 'id_administrador';
    protected $allowedFields = ['id_usuario'];
    protected $useTimestamps = false;
    protected $returnType = 'array';

    // Relación con la tabla usuario
    public function getAdministradorByUserId($id_usuario)
    {
        return $this->where('id_usuario', $id_usuario)->first();
    }
}

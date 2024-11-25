<?php

namespace App\Models;

use CodeIgniter\Model;

class ChefModel extends Model
{
    protected $table = 'chef';
    protected $primaryKey = 'id_chef';
    protected $allowedFields = ['id_usuario'];
    protected $useTimestamps = false;
    protected $returnType = 'array';

    // Relación con la tabla usuario
    public function getChefByUserId($id_usuario)
    {
        return $this->where('id_usuario', $id_usuario)->first();
    }
}

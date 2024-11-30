<?php

namespace App\Models;

use CodeIgniter\Model;

class ClienteModel extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'id_cliente';
    protected $allowedFields = ['id_usuario'];
    protected $useTimestamps = false;
    protected $returnType = 'array';


    public function getClientbyUserId($id_usuario)
    {
        return $this->where('id_usuario', $id_usuario)->first();
    }

}

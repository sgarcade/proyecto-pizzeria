<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    //Modelo usuario
    protected $table= 'usuario' ;  
    protected $primaryKey = 'id_usuario';
    protected $useAutoIncrement = true;
    protected $returnType= 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['nombre', 'direccion', 'ciudad', 'celular','contrasena', 'id_rol', 'correo', 'token'];
    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    

    protected $deletedField = 'deleted_at';
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    public function getClientePorId($id_usuario)
    {       

    return $this->where('id_usuario', $id_usuario)->first();
    }

    
}
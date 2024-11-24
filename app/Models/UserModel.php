<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    
    protected $table= 'usuario' ;  
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType= 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['nombre', 'direccion', 'ciudad', 'correo', 'celular', 'id_rol', 'contrasena'];
    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    

    protected $deletedField = 'deleted_at';
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    

    
}
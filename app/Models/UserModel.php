<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    //Modelo usuario
    protected $table= 'usuario' ;  
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType= 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['nombre', 'direccion', 'ciudad', 'celular','contrasena', 'id_rol', 'correo'];
    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    

    protected $deletedField = 'deleted_at';
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    

    
}
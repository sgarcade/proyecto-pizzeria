<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'usuario'; 
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = [
        'nombre', 'direccion', 'ciudad', 'celular', 
        'contrasena', 'id_rol', 'correo', 'token'
        
    ];
}

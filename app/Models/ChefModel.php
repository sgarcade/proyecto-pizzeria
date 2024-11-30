<?php

namespace App\Models;

use CodeIgniter\Model;

class ChefModel extends Model
{
    protected $table = 'chef';
    protected $primaryKey = 'id_chef';
    protected $allowedFields = ['id_usuario','disponibilidad'];
    protected $useTimestamps = false;
    protected $returnType = 'array';

    // Relación con la tabla usuario
    public function getChefByUserId($id_usuario)
    {
        return $this->where('id_usuario', $id_usuario)->first();
    }
    public function getAllChefs()
    {
        return $this->db->table('chef')
        ->select('chef.id_chef, usuario.id_usuario, usuario.nombre')
        ->join('usuario', 'chef.id_usuario = usuario.id_usuario')
        ->where('chef.disponibilidad', 'Disponible') 
        ->get()
        ->getResultArray();
    }
    
}

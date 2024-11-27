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
    public function getAllDomiciliarios()
    {
        return $this->db->table('domiciliario')
        ->select('domiciliario.id_domiciliario, usuario.id_usuario, usuario.nombre')
        ->join('usuario', 'domiciliario.id_usuario = usuario.id_usuario')
        ->where('domiciliario.disponibilidad', 'Disponible')
        ->get()
        ->getResultArray();

    }
}

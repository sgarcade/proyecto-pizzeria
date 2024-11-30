<?php

namespace App\Models;

use CodeIgniter\Model;

class FeedbackModel extends Model
{
    protected $table = 'feedback'; 
    protected $primaryKey = 'id_feedback'; 
    protected $allowedFields = ['id_cliente', 'comentario', 'calificacion', 'fecha'];
    protected $returnType = 'array';

    
    public function agregarComentario($data)
    {
    
        return $this->insert($data);
    }

    
    public function obtenerComentariosPorCliente($id_cliente)
    {
        return $this->where('id_cliente', $id_cliente)->findAll();
    }

    
    public function obtenerTodosComentarios()
    {
        return $this->findAll();
    }
}

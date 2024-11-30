<?php

namespace App\Models;

use CodeIgniter\Model;

class FeedbackModel extends Model
{
    protected $table = 'feedback'; // Tabla de comentarios
    protected $primaryKey = 'id_feedback'; // Columna de la clave primaria
    protected $allowedFields = ['id_cliente', 'comentario', 'calificacion', 'fecha']; // Los campos que pueden ser insertados/actualizados
    protected $returnType = 'array'; // Devuelve los resultados como un array

    // Método para agregar un comentario
    public function agregarComentario($data)
    {
        // Insertar el comentario en la tabla 'feedback'
        return $this->insert($data);
    }

    // Método para obtener los comentarios de un cliente específico
    public function obtenerComentariosPorCliente($id_cliente)
    {
        return $this->where('id_cliente', $id_cliente)->findAll();
    }

    // Método para obtener todos los comentarios (opcional)
    public function obtenerTodosComentarios()
    {
        return $this->findAll();
    }
}

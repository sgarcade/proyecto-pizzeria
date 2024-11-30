<?php

namespace App\Controllers;

use App\Models\FeedbackModel;
use CodeIgniter\Controller;

class FeedbackController extends Controller
{
    public function __construct()
    {
      
        $this->feedbackModel = new FeedbackModel();
    }

  
    public function formularioComentario()
    {
        $comentarios = $this->feedbackModel->obtenerTodosComentarios(); // Obtiene todos los comentarios.
        return view('feedback', ['comentarios' => $comentarios]); // Carga la vista con los datos.
    }
    

    
    public function guardarComentario()
    {
        $validation = \Config\Services::validation();

        
        if ($this->request->getMethod() === 'post' && $this->validate([
            'comentario' => 'required|min_length[10]|max_length[500]', 
            'calificacion' => 'required|integer|greater_than[0]|less_than[6]'
        ])) {
          
            $data = [
                'id_cliente' => 1, 
                'comentario' => $this->request->getPost('comentario'),
                'calificacion' => $this->request->getPost('calificacion'),
                'fecha' => date('Y-m-d H:i:s') 
            ];

   
            if ($this->feedbackModel->agregarComentario($data)) {
                return redirect()->to('/feedback/formulario')->with('success', 'Comentario guardado con éxito.');
            } else {
                return redirect()->to('/feedback/formulario')->with('error', 'Hubo un error al guardar el comentario.');
            }
        } else {
          
            return redirect()->to('/feedback/formulario')->withInput()->with('validation', $validation->getErrors());
        }
    }

 
    public function verComentarios($id_cliente)
    {
        $comentarios = $this->feedbackModel->obtenerComentariosPorCliente($id_cliente);
        return view('feedback/comentarios', ['comentarios' => $comentarios]);
    }

   
    public function verTodosComentarios()
    {
        $comentarios = $this->feedbackModel->obtenerTodosComentarios();
        return view('feedback/comentarios', ['comentarios' => $comentarios]);
    }
}

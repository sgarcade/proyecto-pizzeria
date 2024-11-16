<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;

class DatabaseTest extends Controller
{
    public function index()
    {
        $db = Database::connect();
        
        $data = [];
        
        // Verifica la conexión
        if ($db->connID) {
            $data['status'] = "Conexión exitosa a la base de datos.";
        } else {
            $data['status'] = "Error al conectar a la base de datos.";
        }
        
        // Cargar la vista
        return view('database_test', $data);
    }
}


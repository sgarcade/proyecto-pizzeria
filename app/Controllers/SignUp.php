<?php

namespace App\Controllers;


use CodeIgniter\Controller; // Asegúrate de tener esta línea
use App\Models\UserModel;

class SignUp extends Controller
{
    public function index(): string
    {
        return view('signup');
    }
    public function register(): string
    {
        try {
            $userModel = new UserModel();
            $nombre = $this->request->getPost('nombre');
            $direccion = $this->request->getPost('direccion');
            $ciudad = $this->request->getPost('ciudad');
            $correo = $this->request->getPost('correo');
            $celular = $this->request->getPost('celular');
            $id_rol = $this->request->getPost('id_rol');
            $contrasena = $this->request->getPost('contrasena');
            $confirm_password = $this->request->getPost('confirm_password');

            // Validación de contraseñas
            if ($contrasena !== $confirm_password) {
                $data['error'] = 'Las contraseñas no coinciden.';
                return view('signup', $data);
            }

            $data = [
                'nombre' => $nombre,
                'direccion' => $direccion,
                'ciudad' => $ciudad,
                'correo' => $correo,
                'celular' => $celular,
                'id_rol' => $id_rol,
                'contrasena' => password_hash($contrasena, PASSWORD_DEFAULT),
            ];

            $query = $userModel->insert($data);

            if ($query) {
                $data['success'] = 'Usuario creado con éxito. Ahora puedes iniciar sesión.';
                return view('signup', $data);
            } else {
                $data['error'] = 'Error al crear el usuario. Intenta nuevamente.';
                return view('signup', $data);
            }
        } catch (\Exception $e) {
            $data['error'] = 'Ocurrió un error: ' . $e->getMessage();
            return view('signup', $data);
        }
    }
}
<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Login extends BaseController
{
    public function index(): string
    {
        
        return view('login');
    }

    public function authenticate(): object
    {
        $loginModel = new LoginModel();

        
        $nombre = $this->request->getPost('correo');
        $contrasena = $this->request->getPost('contrasena');
        
        $usuario = $loginModel->where('correo', $nombre)->first();

        if ($usuario && $contrasena === $usuario['contrasena']) {
  
            session()->set([
                'usuario' => [
                    'id_usuario' => $usuario['id_usuario'],
                    'nombre' => $usuario['nombre'],
                    'id_rol' => $usuario['id_rol']
                ],
                'is_logged_in' => true 
            ]);

            return redirect()->to(base_url('home'));
        } else {
            return redirect()->back()->with('error', 'Usuario o contraseña incorrectos');
        }
    }

    public function logout(): object
    {
        
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}

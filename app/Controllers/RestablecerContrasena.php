<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class RestablecerContrasena extends Controller
{
    public function index($token)
    {
        var_dump("hola");
        exit;
        // Verificar que el token existe en la base de datos
        $userModel = new UserModel();
        $usuario = $userModel->where('reset_token', $token)->first();

        if (!$usuario) {
            return redirect()->to('/login')->with('error', 'El enlace de restablecimiento no es válido o ha expirado.');
        }

        // Mostrar formulario para cambiar la contraseña
        return view('restablecerContrasena', ['token' => $token]);
    }

    public function guardarNuevaContrasena($token)
    {
        $nuevaContrasena = $this->request->getPost('nueva_contrasena');
        
        if (empty($nuevaContrasena)) {
            return redirect()->back()->with('error', 'La contraseña no puede estar vacía.');
        }
        
        $userModel = new UserModel();
        $usuario = $userModel->where('reset_token', $token)->first();

        if (!$usuario) {
            return redirect()->to('/login')->with('error', 'El enlace de restablecimiento no es válido o ha expirado.');
        }

        // Encriptar la nueva contraseña
        $usuario['password'] = password_hash($nuevaContrasena, PASSWORD_DEFAULT);
        $usuario['reset_token'] = null; // Limpiar el token después de usarlo

        // Actualizar la base de datos
        $userModel->update($usuario['id'], $usuario);

        return redirect()->to('/login')->with('success', 'Tu contraseña ha sido restablecida correctamente.');
    }
}

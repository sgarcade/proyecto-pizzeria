<?php

namespace App\Controllers;

use App\Models\UserModel;

class Perfil extends BaseController
{
    public function index(): string
    {
        // Instancia del modelo
        $clienteModel = new UserModel();

        // Recuperar ID del cliente desde la sesión
        $usuarioSesion = session()->get('usuario');
        if (!$usuarioSesion || !isset($usuarioSesion['id_usuario'])) {
            // Redirigir o mostrar error si no hay sesión activa
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión.');
        }

        $clienteId = $usuarioSesion['id_usuario'];

        // Obtener datos del cliente
        $cliente = $clienteModel->getClientePorId($clienteId);

        if (!$cliente) {
            // Manejar caso donde no exista el usuario
            return redirect()->to('/error')->with('error', 'Usuario no encontrado.');
        }


        return view('perfil', ['cliente' => $cliente]);
    }


    public function guardar()
    {
        // Instancia del modelo
        $clienteModel = new UserModel();

        // Recuperar ID del cliente desde la sesión
        $usuarioSesion = session()->get('usuario');
        if (!$usuarioSesion || !isset($usuarioSesion['id_usuario'])) {
            // Redirigir si no hay sesión activa
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión.');
        }

        $clienteId = $usuarioSesion['id_usuario'];

        // Validar los datos enviados
        $datos = $this->request->getPost([
            'nombre',
            'email',
            'telefono',
            'direccion',
            'ciudad',
        ]);

        // Actualizar los datos del cliente
        $clienteModel->update($clienteId, [
            'nombre' => $datos['nombre'],
            'correo' => $datos['email'],
            'celular' => $datos['telefono'],
            'direccion' => $datos['direccion'],
            'ciudad' => $datos['ciudad'],
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->to('/perfil')->with('success', 'Información actualizada correctamente.');
    }
}

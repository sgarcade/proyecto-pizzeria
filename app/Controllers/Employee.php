<?php

namespace App\Controllers;


use CodeIgniter\Controller; 
use App\Models\UserModel;
use App\Models\ChefModel;
use App\Models\DomiciliarioModel;
use App\Models\RecepcionistaModel;
use App\Models\AdministradorModel;
use CodeIgniter\HTTP\RedirectResponse;

class Employee extends Controller
{
    public function index(): string
    {
        return view('registroEmpleados');
    }
    public function register(): RedirectResponse
    {
        try {
            $administradorModel = new AdministradorModel();
            $userModel = new UserModel();
            $chefModel = new ChefModel();
            $recepcionistaModel = new RecepcionistaModel();
            $domiciliarioModel = new DomiciliarioModel();

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
                return redirect()->to(base_url('empleados/lista'))->with('success', 'Usuario agregado correctamente');
            }
            $data = [
                'nombre' => $nombre,
                'direccion' => $direccion,
                'ciudad' => $ciudad,
                'correo' => $correo,
                'celular' => $celular,
                'id_rol' => $id_rol,
                'contrasena' => $contrasena,
            ];

            $query = $userModel->insert($data);
            
            if ($query) {
                if ($id_rol == 2) {
                    $adminData = ['id_usuario' => $userModel->getInsertID()];
                    $administradorModel->insert($adminData);
                    return redirect()->to(base_url('empleados/lista'))->with('success', 'Usuario agregado correctamente');
                } elseif ($id_rol == 3) {
                    $recepcionistaData = ['id_usuario' => $userModel->getInsertID()];
                    $recepcionistaModel->insert($recepcionistaData);
                    return redirect()->to(base_url('empleados/lista'))->with('success', 'Usuario agregado correctamente');
                } elseif ($id_rol == 4) {
                    $chefData = ['id_usuario' => $userModel->getInsertID()];
                    $chefModel->insert($chefData);
                    return redirect()->to(base_url('empleados/lista'))->with('success', 'Usuario agregado correctamente');
                } elseif ($id_rol == 5) {
                    $domiciliarioData = ['id_usuario' => $userModel->getInsertID()];
                    $domiciliarioModel->insert($domiciliarioData);
                    return redirect()->to(base_url('empleados/lista'))->with('success', 'Usuario agregado correctamente');
                }
            } else {
                return redirect()->to(base_url('empleados/lista'))->with('error', 'No se pudo agregar el usuario');
            }
        } catch (\Exception $e) {
            
            return redirect()->to(base_url('empleados/lista'))->with('error', 'No se pudo agregar el usuario');
        }
    }
    public function listaEmpleados()
    {
        $db = \Config\Database::connect();
        $query = $db->query("
            SELECT 
                u.nombre, 
                u.correo, 
                'Chef' AS rol
            FROM usuario u
            INNER JOIN chef c ON u.id_usuario = c.id_usuario
            UNION ALL
            SELECT 
                u.nombre, 
                u.correo, 
                'Domiciliario' AS rol
            FROM usuario u
            INNER JOIN domiciliario d ON u.id_usuario = d.id_usuario
            UNION ALL
            SELECT 
                u.nombre, 
                u.correo, 
                'Recepcionista' AS rol
            FROM usuario u
            INNER JOIN recepcionista r ON u.id_usuario = r.id_usuario
        ");

        $empleados = $query->getResultArray();

        return view('listadoEmpleados', ['empleados' => $empleados]);
    }



}
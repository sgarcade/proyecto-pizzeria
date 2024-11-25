<?php

namespace App\Controllers;


use CodeIgniter\Controller; 
use App\Models\UserModel;
use App\Models\ChefModel;
use App\Models\DomiciliarioModel;
use App\Models\RecepcionistaModel;
use App\Models\AdministradorModel;

class Employee extends Controller
{
    public function index(): string
    {
        return view('registroEmpleados');
    }
    public function register(): string
    {
        try {
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
                return view('registroEmpleados', $data);
            }

            // Datos comunes
            $data = [
                'nombre' => $nombre,
                'direccion' => $direccion,
                'ciudad' => $ciudad,
                'correo' => $correo,
                'celular' => $celular,
                'contrasena' => password_hash($contrasena, PASSWORD_DEFAULT),
            ];

            // Se crea el usuario en la tabla correspondiente según el rol
            if ($id_rol == 1) { 
                $data['id_rol'] = $id_rol;
                $query = $userModel->insert($data);
                if ($query) {
                    $clienteData = ['id_usuario' => $userModel->getInsertID()];
                    $userModel->insert($clienteData);
                }
            } elseif ($id_rol == 2) { 
                $data['id_rol'] = $id_rol;
                $query = $userModel->insert($data);
                if ($query) {
                    $chefData = ['user_id' => $userModel->getInsertID()];
                    $chefModel->insert($chefData);
                }
            } elseif ($id_rol == 3) { 
                $data['id_rol'] = $id_rol;
                $query = $userModel->insert($data);
                if ($query) {
                    $domiciliarioData = ['user_id' => $userModel->getInsertID()];
                    $domiciliarioModel->insert($domiciliarioData);
                }
            } elseif ($id_rol == 4) { 
                $data['id_rol'] = $id_rol;
                $query = $userModel->insert($data);
                if ($query) {
                    $recepcionistaData = ['user_id' => $userModel->getInsertID()];
                    $recepcionistaModel->insert($recepcionistaData);
                }
            }


            if ($query) {
                $data['success'] = 'Usuario creado con éxito. Ahora puedes iniciar sesión.';
                return view('registroEmpleados', $data);
            } else {
                $data['error'] = 'Error al crear el usuario. Intenta nuevamente.';
                return view('registroEmpleados', $data);
            }
        } catch (\Exception $e) {
            $data['error'] = 'Ocurrió un error: ' . $e->getMessage();
            return view('registroEmpleados', $data);
        }
    }
    public function listaEmpleados(): string
    {
        try {

            $chefModel = new ChefModel();
            $domiciliarioModel = new DomiciliarioModel();
            $recepcionistaModel = new RecepcionistaModel();


            $chefs = $chefModel->findAll();  
            $domiciliarios = $domiciliarioModel->findAll();  
            $recepcionistas = $recepcionistaModel->findAll();  


            $data = [
                'chefs' => $chefs,
                'domiciliarios' => $domiciliarios,
                'recepcionistas' => $recepcionistas
            ];


            return view('listadoEmpleados', $data);
        } catch (\Exception $e) {

            $data['error'] = 'Ocurrió un error al obtener los empleados: ' . $e->getMessage();
            return view('listadoEmpleados', $data);
        }
    }

}
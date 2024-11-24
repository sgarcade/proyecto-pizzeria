<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Login extends Controller
{
    protected $session;
    protected $request;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    // Inicializar el servicio de solicitud
        $this->request = \Config\Services::request();
    }

    public function index()
    {
        // Verifica si el usuario ya está logueado
        if ($this->session->get('isLoggedIn')) {
            return redirect()->to(base_url('home'));
        }

        // Mostrar vista de login
        return view('login');
    }

    public function authenticate()
    {
        $userModel = new UserModel();

        // Obtener correo y contraseña del formulario
        $correo = $this->request->getPost('correo');
        $contrasena = $this->request->getPost('contrasena');

        // Verificar si el correo existe en la base de datos
        $query = $userModel->where('correo', $correo)->first();

        if (!$query) {
            // Si el correo no existe, mostrar un mensaje de error
            return redirect()->back()->with('error', 'Correo no registrado.');
        }

        // Verificar si la contraseña es correcta
        if (!password_verify($contrasena, $query->contrasena)) {
            // Si la contraseña es incorrecta
            return redirect()->back()->with('error', 'Contraseña incorrecta.');
        }

        // Si todo es correcto, iniciar sesión
        $this->session->set('usuario', $query);
        $this->session->set('isLoggedIn', true);

        return view('home', session('usuario'));
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url('login'));
    }
}

<?php

namespace App\Controllers;

use App\Models\LoginModel; 
use CodeIgniter\Controller;
use CodeIgniter\Email\Email;

class OlvidoContrasena extends Controller
{
    public function index()
    {
        return view('olvidoContrasena');
    }

    public function restaurarContrasena()
    {
        
        $correo = $this->request->getPost('correo');
        
        
        if (empty($correo)) {
            return redirect()->back()->with('error', 'Por favor ingresa un correo electrónico.');
        }
        
        
        $userModel = new LoginModel();
        
        
        $usuario = $userModel->where('correo', $correo)->first();

        

        if (!$usuario) {
            return redirect()->back()->with('error', 'El correo electrónico no está registrado.');
        }
                

        $token = bin2hex(random_bytes(50)); 
        $userModel->update($usuario['id_usuario'], ['token' => $token]);
       
        $restablecerLink = base_url("restablecer-contrasena/{$token}");
 
        $this->enviarCorreoRestablecimiento($correo, $restablecerLink);

        return redirect()->back()->with('success', 'Te hemos enviado un correo con el enlace para restablecer tu contraseña.');
    }
    private function enviarCorreoRestablecimiento($Correo, $link)
    {
        $correo = \Config\Services::email();
    
        
        $config = [
            'protocol'  => 'smtp',
            'SMTPHost'  => 'smtp.gmail.com',
            'SMTPPort'  => 587, 
            'SMTPUser'  => '',
            'SMTPPass'  => '', 
            'SMTPCrypto'=> 'tls', 
            'mailType'  => 'text',
            'charset'   => 'UTF-8',
            'wordWrap'  => TRUE,
            'newline'   => "\r\n",
        ];
    
        $correo->initialize($config);
    
        $correo->setFrom('davidsant2188@gmail.com', 'Soporte');
        $correo->setTo($Correo);
    
        $correo->setSubject('Restablecer contraseña');
    
        
        $mensaje = "Hola,\n\nHaz clic en el siguiente enlace para restablecer tu contraseña:\n";
        $mensaje .= $link;
    
        $correo->setMessage($mensaje);
    
        
        if (!$correo->send()) {
            log_message('error', 'No se pudo enviar el correo de restablecimiento.');
        }
    }
    
}

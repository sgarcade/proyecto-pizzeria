<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Login extends BaseController
{
    public function index(): string
    {
        
        $session = session();


        if ($session->get('isLoggedIn')) {

            return redirect()->to('/dashboard');
        }


        return view('login');
    }

    public function authenticate()
    {
        $session = session();
        $request = $this->request;

        
        $username = $request->getPost('username');
        $password = $request->getPost('password');

        if ($username === email && $password === password) {
          
            $session->set([
                'username' => $username,
                'isLoggedIn' => true,
            ]);

   
            return redirect()->to('/dashboard');
        }      
        $session->setFlashdata('error', 'Usuario o contraseña incorrectos.');
        return redirect()->to('/login');
    }

    public function logout()
    {
        $session = session();
  
        $session->destroy();

        return redirect()->to('/login');
    }
}

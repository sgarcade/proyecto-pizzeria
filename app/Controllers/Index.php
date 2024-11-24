<?php

namespace App\Controllers;

class Index extends BaseController
{

    public function index(): string
    {
        
           if (!session()->get('is_logged_in')) {
               return redirect()->to(base_url('login'))->with('error', 'Por favor, inicia sesión');
           }
        return view('index');
    }
}

<?php

namespace App\Controllers;
use App\Config\Database;

class PreparacionPedidos extends BaseController
{
    public function index(): string
    {
        
        return view('preparacionPedidos');
    }
}
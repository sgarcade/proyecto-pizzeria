<?php

namespace App\Controllers;

class PreparacionPedidos extends BaseController
{
    public function index(): string
    {
        return view('preparacionPedidos');
    }
}
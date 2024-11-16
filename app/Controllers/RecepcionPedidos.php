<?php

namespace App\Controllers;

class RecepcionPedidos extends BaseController
{
    public function index(): string
    {
        return view('recepcionPedidos');
    }
}
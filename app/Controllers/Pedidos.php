<?php

namespace App\Controllers;

class Pedidos extends BaseController
{
    public function index(): string
    {
        return view('pedidos');
    }
}